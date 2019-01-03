<?php

namespace app\filters;

use yii\base\ActionFilter;

class LoginAuthFilter extends ActionFilter {
    
    public function beforeAction($action) {
        echo 'filters before<br>';
        return parent::beforeAction($action);
    }
    
    public function afterAction($action, $result) {
        echo 'filters after<br>';
        return parent::afterAction($action, $result);
    }
}
