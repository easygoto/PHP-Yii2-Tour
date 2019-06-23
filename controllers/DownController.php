<?php

namespace app\controllers;

use app\web\Yii;
use yii\web\Controller;

class DownController extends Controller
{
    public function actionIndex()
    {
        $response = Yii::$app->response;
        $filePath = Yii::$app->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'console.php';
        $response->sendFile($filePath)->send();
    }
}
