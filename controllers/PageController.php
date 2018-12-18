<?php

namespace app\controllers;

use yii\web\Controller;

class PageController extends Controller {
    
    public function actionInds() {
        echo 1;
    }

    public function actionIndex() {
        return $this->render('index');
    }
}
