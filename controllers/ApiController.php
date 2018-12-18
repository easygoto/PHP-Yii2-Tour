<?php

namespace app\controllers;

use yii\web\Controller;

class ApiController extends Controller {
    
    public function actionSendJson($data = []) {
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/json');
        echo json_encode($data);
    }
    
    public function actionIndex() {
        echo "Api Index...\n";
    }
}
