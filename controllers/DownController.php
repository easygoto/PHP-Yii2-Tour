<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class DownController extends Controller {

    public function actionIndex() {
        $reponse = Yii::$app->response;
        $filePath = Yii::$app->basePath.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'console.php';
        $reponse->sendFile($filePath)->send();
    }
}
