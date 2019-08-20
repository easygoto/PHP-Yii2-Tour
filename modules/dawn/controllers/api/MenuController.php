<?php


namespace app\modules\dawn\controllers\api;

use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\Menu;
use app\web\Yii;

class MenuController extends ApiController
{
    public function actionIndex($page = Constant::DEFAULT_PAGE)
    {
        // 构造条件
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;
        $menuObj = Menu::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);
        if (!$menuObj) {
            return $this->listJson([], 0);
        }

        // 关键信息
        $menuTotal = $menuObj->count('1');
        $menuList = [];
        foreach ($menuObj->all() as $menu) {
            $menuList[] = $menu->getAttributes(null, ['pid']);
        }
        return $this->listJson($menuList, $menuTotal);
    }

    public function actionView($id)
    {
        $menuObj = Menu::findOne($id);
        if (!$menuObj) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $menu = $menuObj->getAttributes(null, ['pid']);
        return $this->successJson(Message::SUCCESS, $menu);
    }

    public function actionCreate()
    {
        $params = Yii::$app->request->post();
        $menu = new Menu;
        $menu->setAttributes($params);
        if (!$menu->save(true)) {
            return $this->failJson(Message::CREATE_FAIL, $menu->getErrors());
        }
        return $this->successJson(Message::CREATE_SUCCESS, ['id' => $menu->getAttribute('id')]);
    }

    public function actionUpdate($id)
    {
        $menu = Menu::findOne($id);
        if (!$menu) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $params = Yii::$app->request->post();
        $menu->setAttributes($params);
        if (!$menu->save(true)) {
            return $this->failJson(Message::UPDATE_FAIL, $menu->getErrors());
        }
        return $this->successJson(Message::UPDATE_SUCCESS);
    }

    public function actionDelete($id)
    {
        $menu = Menu::findOne($id);
        if (!$menu) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $result = Menu::deleteAll(['id' => $id]);
        if (!$result) {
            return $this->failJson(Message::DELETE_FAIL);
        }
        return $this->successJson(Message::DELETE_SUCCESS);
    }
}
