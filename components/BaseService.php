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

    /** @var Closure $callback */
    protected $callback;

    public function __construct()
    {
        $this->modelClass = str_replace('components\services', 'models', get_class($this));
        $this->callback = function (ActiveRecord $item) {
            return $item->getAttributes();
        };
    }

    abstract protected function handleFilter(ActiveQuery $query, $keywords): ActiveQuery;

    protected function handleSort(ActiveQuery $query, $keywords): ActiveQuery
    {
        $sorts = explode(',', $keywords['sort'] ?? '');
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        foreach ($sorts as $sort) {
            if (!$sort) {
                continue;
            }
            $orderMethod = $sort[0] == '-' ? 'DESC' : 'ASC';
            $orderColumn = Format::toUnderScore($sort[0] == '-' ? substr($sort, 1) : $sort);
            if ($model->hasAttribute($orderColumn)) {
                $query->addOrderBy("{$orderColumn} {$orderMethod}");
            }
        }
        return $query;
    }

    protected function handleKeywords(ActiveQuery $query, $keywords): ActiveQuery
    {
        $query = $this->handleFilter($query, $keywords);
        $query = $this->handleSort($query, $keywords);
        return $query;
    }

    public function lists(array $keywords, Closure $callback = null)
    {
        $callback = $callback ?: $this->callback;
        $keywords = Format::array2UnderScore($keywords);
        $page = max(1, $keywords['page'] ?? Constant::DEFAULT_PAGE);
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;

        $query = $this->modelClass::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);
        $query = $this->handleKeywords($query, $keywords);

        $total = $query->count('1');
        $list = array_map(function (ActiveRecord $item) use ($callback) {
            return $callback($item);
        }, $query->all());
        $list = Format::array2CamelCase($list);

        return Result::lists($list, $total);
    }

    public function get($id, $params = [], $include = null, $exclude = [])
    {
        $query = $this->modelClass::find()->where(['id' => $id]);
        $object = $query->one();
        if (!$object) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $object = $query->andFilterWhere($params)->one();
        if (!$object) {
            return Result::fail(Message::NOT_RESULT);
        }

        $detail = $object->getAttributes($include, $exclude);
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
