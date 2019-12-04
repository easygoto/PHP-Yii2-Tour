<?php


namespace app\core\components;

use app\core\containers\Constant;
use app\core\containers\Message;
use app\core\helpers\SortHandler;
use Closure;
use Throwable;
use Trink\Core\Helper\Result;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

abstract class BaseService
{
    protected ActiveRecord $model;

    protected Message $message;

    protected Closure $handleResult;

    protected Closure $handleQuery;

    public function __construct()
    {
        $serviceClassName = rtrim(get_class($this), 'Service');
        $modelClassName = str_replace('core\services', 'models', $serviceClassName);
        $messageClassName = str_replace('core\services', 'core\containers\messages', $serviceClassName . 'Message');
        $messageClassName = class_exists($messageClassName) ? $messageClassName : Message::class;

        $this->model = new $modelClassName;
        $this->message = new $messageClassName;
        $this->handleQuery = fn (ActiveQuery $query) => $query;
        $this->handleResult = fn (ActiveRecord $item) => $item->getAttributes();
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
     * @param Closure|null $handleQuery  构造查询条件
     * @param Closure|null $handleResult 处理结果集
     *
     * @return Result
     */
    public function allByAttr(array $keywords = [], Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        /** @var ActiveQuery $query */
        $query = $this->model::find();
        $query = $this->handleSort($query, SortHandler::load($keywords));
        $query = $handleQuery($query);

        $total = $query->count('1');
        $list = array_map(fn (ActiveRecord $item) => $handleResult($item), $query->all());
        return Result::success('OK', ['list' => $list, 'total' => $total]);
    }

    /**
     * 根据条件获取列表记录
     *
     * @param array        $keywords
     * @param Closure|null $handleQuery  构造查询条件
     * @param Closure|null $handleResult 处理结果集
     *
     * @return Result
     */
    public function listsByAttr(array $keywords = [], Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        $page = (int)($keywords['page'] ?? Constant::DEFAULT_PAGE);
        $page = max($page, Constant::MIN_PAGE);
        $pageSize = (int)($keywords['page_size'] ?? Constant::DEFAULT_PAGE_SIZE);
        $pageSize = min($pageSize, Constant::MAX_PAGE_SIZE);
        $pageSize = max($pageSize, Constant::MIN_PAGE_SIZE);
        $offset = ($page - 1) * $pageSize;

        /** @var ActiveQuery $query */
        $query = $this->model::find()->offset($offset)->limit($pageSize);
        $query = $this->handleSort($query, SortHandler::load($keywords));
        $query = $handleQuery($query);

        $total = $query->count('1');
        $list = array_map(fn (ActiveRecord $item) => $handleResult($item), $query->all());
        return Result::lists($list, $total, $page, $pageSize);
    }

    /**
     * 根据条件判断记录是否存在
     *
     * @param Closure|null $handleQuery
     *
     * @return Result
     */
    public function existsByAttr(?Closure $handleQuery)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        /** @var ActiveQuery $query */
        $query = $this->model::find();
        $query = $handleQuery($query);
        if ($query->exists() === false) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }
        return Result::success();
    }

    public function get(int $id, Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        return $this->getByAttr($handleResult, fn (ActiveQuery $query) => ($handleQuery($query))->andFilterWhere(['id' => $id]));
    }

    /**
     * 根据条件获取记录详情
     *
     * @param Closure|null $handleQuery
     * @param Closure|null $handleResult
     *
     * @return Result
     */
    public function getByAttr(Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        /** @var ActiveQuery $query */
        $query = $this->model::find();
        $query = $handleQuery($query);
        $object = $query->one();
        if (!$object) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $detail = $handleResult($object);
        return Result::success('OK', $detail);
    }

    public function save(array $params)
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
    }

    public function add(array $params)
    {
        $this->model->setAttributes($params);
        if (!$this->model->save(true)) {
            return Result::fail($this->message::get('CREATE_FAIL'), $this->model->getErrors());
        }

        return Result::success($this->message::get('CREATE_SUCCESS'), [
            'id' => $this->model->getAttribute('id'),
        ]);
    }

    public function edit(int $id, array $params)
    {
        $model = $this->model::findOne($id);
        if (!$model) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->message::get('UPDATE_FAIL'), $model->getErrors());
        }

        return Result::success($this->message::get('UPDATE_SUCCESS'));
    }

    /**
     * 根据条件彻底删除记录
     *
     * @param Closure|null $handleQuery
     *
     * @return Result
     */
    public function deleteByAttr(?Closure $handleQuery)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;

        /** @var ActiveQuery $query */
        $query = $this->model::find();
        $query = $handleQuery($query);
        $object = $query->one();
        if (!$object) {
            return Result::success($this->message::get('DELETED'));
        }
        try {
            $object->delete();
            return Result::success($this->message::get('DELETE_SUCCESS'));
        } catch (Throwable $e) {
            return Result::fail($this->message::get('DELETE_FAIL'), $object->getErrors());
        }
    }
}
