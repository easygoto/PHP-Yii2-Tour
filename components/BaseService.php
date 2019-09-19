<?php


namespace app\components;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use Closure;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

abstract class BaseService
{
    /** @var ActiveRecord */
    protected $modelClass;

    /** @var Closure */
    protected $handleResult;

    /** @var Closure */
    protected $handleQuery;

    public function __construct()
    {
        $this->modelClass = str_replace('components\services', 'models', get_class($this));
        $this->handleResult = function (ActiveRecord $item) {
            return $item->getAttributes();
        };
        $this->handleResult = function (ActiveQuery $query) {
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
        $page = max(1, (int)$keywords['page'] ?? Constant::DEFAULT_PAGE);
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;

        $query = $this->modelClass::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);
        $query = $this->handleFilter($query, $keywords);
        $query = $this->handleSort($query, $keywords);

        $total = $query->count('1');
        $list = array_map(function (ActiveRecord $item) use ($handleResult) {
            return $handleResult($item);
        }, $query->all());
        $list = Format::array2CamelCase($list);

        return Result::lists($list, $total);
    }

    public function exists($id, Closure $handleQuery = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $query = $this->modelClass::find()->where(['id' => $id]);
        $query = $handleQuery($query);
        if ($query->exists() === false) {
            return Result::fail(Message::NOT_EXISTS);
        }
        return Result::success('OK');
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
            return Result::fail(Message::NOT_EXISTS);
        }

        $detail = $handleResult($object);
        $detail = Format::array2CamelCase($detail);
        return Result::success(Message::SUCCESS, $detail);
    }

    public function add($params)
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail(Message::CREATE_FAIL, $model->getErrors());
        }

        return Result::success(Message::CREATE_SUCCESS, [
            'id' => $model->getAttribute('id'),
        ]);
    }

    public function edit($id, $params)
    {
        $model = $this->modelClass::findOne($id);
        if (!$model) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail(Message::UPDATE_FAIL, $model->getErrors());
        }

        return Result::success(Message::UPDATE_SUCCESS);
    }

    public function del($id, $params = [])
    {
        $query = $this->modelClass::find()->where(['id' => $id]);
        $exists = $query->exists();
        if (!$exists) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $exists = $query->andFilterWhere($params)->exists();
        if (!$exists) {
            return Result::success(Message::DELETED);
        }

        $result = $this->modelClass::deleteAll(['id' => $id]);
        if (!$result) {
            return Result::fail(Message::DELETE_FAIL);
        }

        return Result::success(Message::DELETE_SUCCESS);
    }
}
