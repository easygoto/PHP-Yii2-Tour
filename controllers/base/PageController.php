<?php

namespace app\controllers\base;

use yii\web\Controller;

class PageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
