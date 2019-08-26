<?php


namespace app\modules\dawn\components\services;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\Menu;
use app\web\Yii;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;

class MenuService
{
    public function lists($keywords)
    {
        $page = $keywords['page'] ?? Constant::DEFAULT_PAGE;
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;
        $query = Menu::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);

        $total = $query->count('1');
        $list = array_map(function (Menu $menu) {
            return $menu->getAttributes();
        }, $query->all());
        $list = Format::array2CamelCase($list);

        return Result::lists($list, $total);
    }

    public function get($id)
    {
        $object = Menu::findOne($id);
        if (!$object) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $detail = $object->getAttributes();
        $detail = Format::array2CamelCase($detail);

        return Result::success(Message::SUCCESS, $detail);
    }

    public function add($params)
    {
        $menu = new Menu;
        $menu->setAttributes($params);
        if (!$menu->save(true)) {
            return Result::fail(Message::CREATE_FAIL, $menu->getErrors());
        }

        return Result::success(Message::CREATE_SUCCESS, [
            'id'     => $menu->getAttribute('id'),
            'menu'   => $menu,
            'params' => $params,
        ]);
    }

    public function edit($id, $params)
    {
        $menu = Menu::findOne($id);
        if (!$menu) {
            return Result::fail(Message::NOT_EXISTS);
        }
        $menu->setAttributes($params);
        if (!$menu->save(true)) {
            return Result::fail(Message::UPDATE_FAIL, $menu->getErrors());
        }
        return Result::success(Message::UPDATE_SUCCESS, ['params' => $params]);
    }

    public function del($id)
    {
        $exists = Menu::find()->exists(['id' => $id]);
        if (!$exists) {
            return Result::fail(Message::NOT_EXISTS);
        }

        $result = Menu::deleteAll(['id' => $id]);
        if (!$result) {
            return Result::fail(Message::DELETE_FAIL);
        }

        return Result::success(Message::DELETE_SUCCESS);
    }
}
