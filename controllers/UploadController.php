<?php

namespace app\controllers;

use app\web\Yii;
use yii\web\Controller;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
    }
}
