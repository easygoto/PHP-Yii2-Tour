<?php


namespace app\modules\dawn\components\services;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models;
use app\web\Yii;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;

class Menu
{
    public function lists($keywords)
    {
        $page = $keywords['page'] ?? Constant::DEFAULT_PAGE;
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;

        $query = models\Menu::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);

        $model = new models\Menu;
        $model->load($keywords);
        $query->andFilterWhere([
            'pid' => $model->pid,
            'sn' => $model->sn,
            'url' => $model->url,
            'sort' => $model->sort,
            'status' => $model->status,
        ]);
        $query->andFilterWhere(['like', 'name', $model->name]);
        $query->andFilterWhere(['like', 'icon', $model->icon]);

        $total = $query->count('1');
        $list = array_map(function (models\Menu $menu) {
            return $menu->getAttributes();
        }, $query->all());
        $list = Format::array2CamelCase($list);

        return Result::lists($list, $total);
    }

    public function get($id)
    {
        $object = models\Menu::findOne($id);
        if (!$object) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $detail = $object->getAttributes();
        $detail = Format::array2CamelCase($detail);

        return Result::success(Message::SUCCESS, $detail);
    }

    public function add($params)
    {
        $model = new models\Menu;
        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail(Message::CREATE_FAIL, $model->getErrors());
        }

        return Result::success(Message::CREATE_SUCCESS, [
            'id' => $model->getAttribute('id'),
            'menu' => $model,
            'params' => $params,
        ]);
    }

    public function edit($id, $params)
    {
        $model = models\Menu::findOne($id);
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
        $exists = models\Menu::find()->where(['id' => $id])->exists();
        if (!$exists) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $result = models\Menu::deleteAll(['id' => $id]);
        if (!$result) {
            return Result::fail(Message::DELETE_FAIL);
        }

        return Result::success(Message::DELETE_SUCCESS);
    }
}
