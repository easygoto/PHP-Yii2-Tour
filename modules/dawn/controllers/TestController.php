<?php


namespace app\modules\dawn\controllers;

use app\modules\dawn\Module;
use yii\db\ActiveRecord;
use yii\web\Controller;

class TestController extends Controller
{
    /** @var Module */
    public $module;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGoods()
    {
        $result = $this->module->goodsService->lists([], function (ActiveRecord $item) {
            return $item->getAttributes();
        });
        $this->asJson($result->asArray());
    }
}
