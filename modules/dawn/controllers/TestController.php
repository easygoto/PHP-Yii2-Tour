<?php


namespace app\modules\dawn\controllers;

use app\controllers\base\PageController;

class TestController extends PageController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
