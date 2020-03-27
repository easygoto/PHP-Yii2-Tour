<?php

namespace app\core\components;

use app\core\containers\Constant;
use app\core\containers\Message;
use app\core\helpers\FilterHandler;
use app\core\helpers\SortHandler;
use Closure;
use Exception;
use Swoole\Process;
use Throwable;
use Trink\Core\Helper\Result;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

abstract class BaseService
{
    protected string $modelClass;
    protected string $messageClass;

    protected Message $message;

    protected ActiveRecord $model;

    public function __construct()
    {
        $serviceClass = rtrim(get_class($this), 'Service');
        $modelClass = str_replace('core\services', 'models', $serviceClass);
        $messageClass = str_replace('core\services', 'core\containers\messages', $serviceClass . 'Message');
        $messageClass = class_exists($messageClass) ? $messageClass : Message::class;

        $this->model = new $modelClass();
        $this->message = new $messageClass();
        $this->modelClass = $modelClass;
        $this->messageClass = $messageClass;
    }

    /**
     * 处理返回结果
     *
     * @param ActiveRecord $item
     * @param string       $scope
     *
     * @return array
     */
    protected function handleResult(ActiveRecord $item, $scope = 'list')
    {
        if (!defined($this->modelClass . '::RESULT_FILTER') || isset($this->modelClass::RESULT_FILTER[$scope])) {
            $itemArray = $item->getAttributes();
        } else {
            $include = ArrayHelper::getValue($this->modelClass::RESULT_FILTER[$scope], 'include', null);
            $exclude = ArrayHelper::getValue($this->modelClass::RESULT_FILTER[$scope], 'exclude', null);
            $itemArray = $item->getAttributes($include, $exclude);
        }
        if (defined($this->modelClass . '::FIELD_DETAIL')) {
            // TODO 事件分发
            // 强类型转换
            foreach ($this->modelClass::FIELD_DETAIL as $field => $detail) {
                if (!array_key_exists($field, $itemArray)) {
                    continue;
                }
                $type = ArrayHelper::getValue($detail, 'type', 'string');
                if ($type == 'float') {
                    $itemArray[$field] = (float)$itemArray[$field];
                } elseif ($type == 'int') {
                    $itemArray[$field] = (int)$itemArray[$field];
                }
            }
        }
        return $itemArray;
    }

    /**
     * 处理过滤字段
     *
     * @param ActiveQuery $query
     * @param array       $keywords
     *
     * @return ActiveQuery
     */
    protected function handleFilter(ActiveQuery $query, array $keywords = []): ActiveQuery
    {
        $likeFieldList = $equalsFieldList = $rangeFieldList = [];
        if (defined($this->modelClass . '::FIELD_DETAIL')) {
            // TODO 事件分发
            foreach ($this->modelClass::FIELD_DETAIL as $field => $detail) {
                $filterType = ArrayHelper::getValue($detail, 'filter', 'none');
                if ($filterType == 'range') {
                    $rangeFieldList[] = $field;
                } elseif ($filterType == 'equals') {
                    $equalsFieldList[] = $field;
                } elseif ($filterType == 'like') {
                    $likeFieldList[] = $field;
                }
            }
        }
        return (new FilterHandler())
            ->setKeywords($keywords)
            ->setLike($likeFieldList)
            ->setEquals($equalsFieldList)
            ->setRange($rangeFieldList)
            ->buildQuery($query);
    }

    /**
     * 处理排序
     *
     * @param ActiveQuery $query
     * @param SortHandler $sorter
     *
     * @return ActiveQuery
     */
    protected function handleSort(ActiveQuery $query, SortHandler $sorter): ActiveQuery
    {
        $primaryKey = $this->model->primaryKey;
        if (!$sorter->hasRule($primaryKey)) {
            $sorter->addRule($primaryKey, 'DESC');
        }
        foreach ($sorter->getProps() as $column => $method) {
            if ($this->model->hasAttribute($column)) {
                $query->addOrderBy("{$column} {$method}");
            }
        }
        return $query;
    }

    /**
     * 根据条件获取全部记录
     *
     * @param array        $keywords
     * @param Closure|null $handleQuery 构造查询条件
     *
     * @return Result
     */
    protected function allByAttr(array $keywords = [], Closure $handleQuery = null)
    {
        $limit = (int)($keywords['limit'] ?? Constant::DEFAULT_LIMIT);

        /** @var ActiveQuery $query */
        $query = $this->model::find();
        $query = $this->handleSort($query, SortHandler::load($keywords));
        $query = $limit > 0 ? $query->limit($limit) : $query;
        if ($handleQuery) {
            $query = $handleQuery($query);
        }

        $total = (int)$query->count('1');
        $list = array_map(fn (ActiveRecord $item) => $this->handleResult($item, 'all'), $query->all());
        return Result::success('OK', ['list' => $list, 'limit' => $limit ?: $total, 'total' => $total]);
    }

    /**
     * 根据条件获取列表记录
     *
     * @param array        $keywords
     * @param Closure|null $handleQuery 构造查询条件
     *
     * @return Result
     */
    protected function listsByAttr(array $keywords = [], Closure $handleQuery = null)
    {
        $page = (int)($keywords['page'] ?? Constant::DEFAULT_PAGE);
        $page = max($page, Constant::MIN_PAGE);
        $pageSize = (int)($keywords['page_size'] ?? Constant::DEFAULT_PAGE_SIZE);
        $pageSize = min($pageSize, Constant::MAX_PAGE_SIZE);
        $pageSize = max($pageSize, Constant::MIN_PAGE_SIZE);
        $offset = ($page - 1) * $pageSize;

        /** @var ActiveQuery $query */
        $query = $this->model::find()->offset($offset)->limit($pageSize);
        $query = $this->handleSort($query, SortHandler::load($keywords));
        if ($handleQuery) {
            $query = $handleQuery($query);
        }

        $total = $query->count('1');
        $list = array_map(fn (ActiveRecord $item) => $this->handleResult($item, 'list'), $query->all());
        return Result::lists($list, $total, $page, $pageSize);
    }

    /**
     * 根据条件判断记录是否存在
     *
     * @param Closure|null $handleQuery
     *
     * @return Result
     */
    protected function existsByAttr(?Closure $handleQuery)
    {
        /** @var ActiveQuery $query */
        $query = $this->model::find();
        if ($handleQuery) {
            $query = $handleQuery($query);
        }
        if ($query->exists() === false) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }
        return Result::success();
    }

    /**
     * 根据条件获取记录详情
     *
     * @param Closure|null $handleQuery
     *
     * @return Result
     */
    protected function getByAttr(Closure $handleQuery = null)
    {
        /** @var ActiveQuery $query */
        $query = $this->model::find();
        if ($handleQuery) {
            $query = $handleQuery($query);
        }
        $object = $query->one();
        if (!$object) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $detail = $this->handleResult($object, 'detail');
        return Result::success('OK', $detail);
    }

    /*protected function save(array $params)
    {
        $modelId = (int)($params['id'] ?? 0);
        $result = $this->exists($modelId);
        if ($result->isSuccess()) {
            $model = new $this->model;
        } else {
            $model = $this->model::findOne($modelId);
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->message::get('SAVE_FAIL'), $model->getErrors());
        }

        return Result::success($this->message::get('SAVE_SUCCESS'), [
            'id' => $model->getAttribute('id'),
        ]);
    }*/

    /**
     * 添加一条记录
     *
     * @param array $params
     *
     * @return Result
     */
    protected function addOne(array $params)
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass();
        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->message::get('CREATE_FAIL'), $model->getErrors());
        }
        return Result::success($this->message::get('CREATE_SUCCESS'), $model->getAttributes());
    }

    protected function addAll()
    {
        // TODO
        return Result::success();
    }

    /**
     * 根据条件编辑一条记录
     *
     * @param array   $params
     * @param Closure $handleQuery
     *
     * @return Result
     */
    protected function editOneByAttr(array $params, Closure $handleQuery = null)
    {
        /** @var ActiveQuery $query */
        $query = $this->model::find();
        if ($handleQuery) {
            $query = $handleQuery($query);
        }
        $object = $query->one();
        if (!$object) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $object->setAttributes($params);
        if (!$object->save(true)) {
            return Result::fail($this->message::get('UPDATE_FAIL'), $object->getErrors());
        }

        return Result::success($this->message::get('UPDATE_SUCCESS'), $object->getAttributes());
    }

    protected function editAllByAttr()
    {
        // TODO
        return Result::success();
    }

    /**
     * 根据条件彻底删除一条记录
     *
     * @param Closure|null $handleQuery
     *
     * @return Result
     */
    protected function deleteOneByAttr(?Closure $handleQuery)
    {
        /** @var ActiveQuery $query */
        $query = $this->model::find();
        if ($handleQuery) {
            $query = $handleQuery($query);
        }
        $object = $query->one();
        if (!$object) {
            return Result::success($this->message::get('DELETED'));
        }
        try {
            $result = $object->delete();
            if ($result === false) {
                throw new Exception($this->message::get('DELETE_FAIL'));
            }
            return Result::success($this->message::get('DELETE_SUCCESS'));
        } catch (Throwable $e) {
            return Result::fail($e->getMessage(), $object->getErrors());
        }
    }

    protected function deleteAllByAttr()
    {
        // TODO
        return Result::success();
    }
}
