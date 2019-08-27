<?php


namespace app\components;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

abstract class BaseService
{
    /** @var ActiveRecord */
    protected $modelClass;

    abstract protected function search(ActiveQuery $query, $keywords): ActiveQuery;

    public function lists($keywords)
    {
        $keywords = Format::array2UnderScore($keywords);
        $page = $keywords['page'] ?? Constant::DEFAULT_PAGE;
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;

        $query = $this->modelClass::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);
        $query = $this->search($query, $keywords);

        $total = $query->count('1');
        $list = array_map(function (ActiveRecord $item) {
            return $item->toArray();
        }, $query->all());
        $list = Format::array2CamelCase($list);

        return Result::lists($list, $total);
    }

    public function get($id)
    {
        $object = $this->modelClass::findOne($id);
        if (!$object) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $detail = $object->toArray();
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
            'id'     => $model->getAttribute('id'),
            'menu'   => $model,
            'params' => $params,
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

        return Result::success(Message::UPDATE_SUCCESS, ['params' => $params]);
    }

    public function del($id)
    {
        $exists = $this->modelClass::find()->where(['id' => $id])->exists();
        if (!$exists) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $result = $this->modelClass::deleteAll(['id' => $id]);
        if (!$result) {
            return Result::fail(Message::DELETE_FAIL);
        }

        return Result::success(Message::DELETE_SUCCESS);
    }
}
