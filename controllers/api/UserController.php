<?php

namespace app\controllers\api;

use app\controllers\BaseapiController;

class UserController extends BaseapiController {
    
    public function actionGet($id=0) {
        $this->asJson([$id]);
    }
    
    public function actionGetList() {
    
    }
    
    public function actionAdd() {
    
    }
    
    public function actionEdit() {
    
    }
    
    public function actionDelete() {
    
    }
    
    public function actionEnable() {
    
    }
    
    public function actionDisable() {
    
    }
}
