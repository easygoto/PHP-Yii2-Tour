<?php


namespace app\components;

use app\helpers\Constant;
use app\helpers\Message;
use Closure;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

abstract class BaseService
{
    use InjectionTool;

    /** @var ActiveRecord */
    protected $modelClass;

    /** @var Message */
    protected $messageClass;

    /** @var Closure */
    protected $handleResult;

    /** @var Closure */
    protected $handleQuery;

    public function __construct()
    {
        $this->modelClass = str_replace('components\services', 'models', get_class($this));
        $messageClass = preg_replace('/components\\\\services\\\\\w+/', 'helpers\Message', get_class($this));
        $this->messageClass = class_exists($messageClass) ? $messageClass : Message::class;
        $this->handleResult = function (ActiveRecord $item) {
            return $item->getAttributes();
        };
        $this->handleQuery = function (ActiveQuery $query) {
            return $query;
        };
    }

    abstract protected function handleFilter(ActiveQuery $query, $keywords): ActiveQuery;

    protected function handleSort(ActiveQuery $query, array $keywords): ActiveQuery
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $sorts = explode(',', $keywords['sort'] ?? '');
        foreach ($sorts as $sort) {
            $firstChar = $sort[0] ?? '';
            if (!$firstChar) {
                continue;
            }
            $orderColumn = Format::toUnderScore(ltrim($sort, '-'));
            if ($model->hasAttribute($orderColumn)) {
                $orderMethod = $firstChar == '-' ? 'DESC' : 'ASC';
                $query->addOrderBy("{$orderColumn} {$orderMethod}");
            }
        }
        return $query;
    }

    public function lists(array $keywords = [], Closure $handleResult = null)
    {
        $handleResult = $handleResult ?: $this->handleResult;
        $keywords = Format::array2UnderScore($keywords);

        $page = (int)$keywords['page'] ?? Constant::DEFAULT_PAGE;
        $page = max($page, Constant::MIN_PAGE);
        $pageSize = (int)$keywords['pageSize'] ?? Constant::DEFAULT_PAGE_SIZE;
        $pageSize = min($pageSize, Constant::MAX_PAGE_SIZE);
        $pageSize = max($pageSize, Constant::MIN_PAGE_SIZE);
        $offset = ($page - 1) * $pageSize;

        $query = $this->modelClass::find()->offset($offset)->limit($pageSize);
        $query = $this->handleFilter($query, $keywords);
        $query = $this->handleSort($query, $keywords);

        $total = $query->count('1');
        $list = array_map(function (ActiveRecord $item) use ($handleResult) {
            return $handleResult($item);
        }, $query->all());
        $list = Format::array2CamelCase($list);

        return Result::lists($list, $total);
    }

    public function exists(int $id, Closure $handleQuery = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $query = $this->modelClass::find()->where(['id' => $id]);
        $query = $handleQuery($query);
        if ($query->exists() === false) {
            return Result::fail($this->messageClass::NOT_EXISTS);
        }
        return Result::success();
    }

    public function get(int $id, Closure $handleResult = null, Closure $handleQuery = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        return $this->getByAttr($handleResult, function (ActiveQuery $query) use ($id, $handleQuery) {
            return ($handleQuery($query))->andFilterWhere(['id' => $id]);
        });
    }

    public function getByAttr(Closure $handleResult = null, Closure $handleQuery = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        $query = $this->modelClass::find();
        $object = ($handleQuery($query))->one();
        if (!$object) {
            return Result::fail($this->messageClass::NOT_EXISTS);
        }

        $detail = $handleResult($object);
        $detail = Format::array2CamelCase($detail);
        return Result::success('OK', $detail);
    }

    public function save(array $params)
    {
        $modelId = (int)($params['id'] ?? 0);
        $result = $this->exists($modelId);
        if ($result->isSuccess()) {
            $model = new $this->modelClass;
        } else {
            $model = $this->modelClass::findOne($modelId);
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->messageClass::SAVE_FAIL, $model->getErrors());
        }

        return Result::success($this->messageClass::SAVE_SUCCESS, [
            'id' => $model->getAttribute('id'),
        ]);
    }

    public function add(array $params)
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->messageClass::CREATE_FAIL, $model->getErrors());
        }

        return Result::success($this->messageClass::CREATE_SUCCESS, [
            'id' => $model->getAttribute('id'),
        ]);
    }

    public function edit(int $id, array $params)
    {
        $model = $this->modelClass::findOne($id);
        if (!$model) {
            return Result::fail($this->messageClass::NOT_EXISTS);
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->messageClass::UPDATE_FAIL, $model->getErrors());
        }

        return Result::success($this->messageClass::UPDATE_SUCCESS);
    }

    public function delete(int $id, array $params = [])
    {
        $query = $this->modelClass::find()->where(['id' => $id]);
        $exists = $query->exists();
        if (!$exists) {
            return Result::fail($this->messageClass::NOT_EXISTS);
        }

        $exists = $query->andFilterWhere($params)->exists();
        if (!$exists) {
            return Result::success($this->messageClass::DELETED);
        }

        $result = $this->modelClass::deleteAll(['id' => $id]);
        if (!$result) {
            return Result::fail($this->messageClass::DELETE_FAIL);
        }

        return Result::success($this->messageClass::DELETE_SUCCESS);
    }
}
