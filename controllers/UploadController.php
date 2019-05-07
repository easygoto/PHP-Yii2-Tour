<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
    }
}
