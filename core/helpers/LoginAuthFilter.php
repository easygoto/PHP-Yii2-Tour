<?php

namespace app\core\helpers;

use yii\base\ActionFilter;

class LoginAuthFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        /*$cookies = $_SERVER['HTTP_COOKIE'];
        $cookieList = explode('; ', $cookies);
        array_map(function($cookie) use (& $cookieArr) {
            list($key, $value) = explode('=', $cookie);
            $cookieArr[$key] = $value;
        }, $cookieList);

        if (isset($cookieArr['_identity']) && ! empty($cookieArr['_identity'])) {
            $identity = urldecode($cookieArr['_identity']);
            $identity = unserialize(substr($identity, 64));

            $authStr = (isset($identity[1]) && ! empty($identity[1])) ? $identity[1] : json_encode([1,'']);
            list($userId, $token) = json_decode($authStr, 1);
            $user = User::findIdentity($userId);
            if ($user && $user->authKey === $token) {
                Yii::$app->params['isLogin'] = 1;
                return parent::beforeAction($action);
            }
        }

        // 未登录 跳转至首页
        if ($action->controller->id !== 'site' && $action->id !== 'index') {
            Yii::$app->getResponse()->redirect('site/index');
        } else {
            return parent::beforeAction($action);
        }*/
        echo 'filters before<br>';
        return parent::beforeAction($action);
    }
    
    public function afterAction($action, $result)
    {
        echo 'filters after<br>';
        return parent::afterAction($action, $result);
    }
}
