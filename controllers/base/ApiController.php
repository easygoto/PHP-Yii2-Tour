<?php

namespace app\controllers\base;

use app\utils\RetUtil;
use Yii;
use app\filters\LoginAuthFilter;
use yii\helpers\Url;
use yii\web\Controller;
use app\utils\TestUtil;
use yii\web\Cookie;

class ApiController extends Controller {
    
    public $defaultAction = 'index';
    
    // 过滤器
    public function behaviors() {
        return [
            [
                /*
                 * 默认不过滤
                 * only 只过滤某些, 其他的不过滤
                 * except 不过滤某些, 其他的全过滤
                 * 两者结合使用, 各做各的事情, 其他的不过滤
                 */
                'class'  => LoginAuthFilter::className(),
                'only'   => ['demo'],
                'except' => ['test'],
            ],
        ];
    }
    
    public function successJson($data = [], $msg = '', $debug = []) {
        return $this->asJson(RetUtil::success($data, $msg, $debug));
    }
    
    public function failJson($msg = '', $data = [], $debug = []) {
        return $this->asJson(RetUtil::fail($msg, $data, $debug));
    }
    
    public function actionSendjson() {
        $this->asJson([
            'controllerId' => $this->id,
            'route'        => $this->route,
            'basePath'     => \Yii::$app->basePath,
        ]);
    }
    
    public function actionIndex() {
        echo "Join Base Api ...";
        echo "<br>";
    }
    
    public function actionDemo() {
        echo "Base Api Demo ...";
        echo "<br>";
        echo "<a href='" . Url::to(['api/user/get', 'id' => 10]) . "'>api/user/get?id=10</a>";
        echo "<br>";
    }
    
    public function actionTest() {
        TestUtil::test();
        echo "Base Api Test ...";
        echo "<br>";
    }
    
    public function actionSession() {
        $session = Yii::$app->session;
        $session->open();
        $session->set('haha', 'haha');
        echo $session->get('haha');
        $session->close();
        if ($session->isActive) {
            $session->destroy();
        }
    }
    
    public function actionSetcookie() {
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name'  => 'language',
            'value' => 'zh-CN',
        ]));
    }
    
    public function actionCookie() {
        // 只能获取后端设置的 cookie
        $cookies = Yii::$app->request->cookies;
        var_dump($cookies->getValue('language', 'zh-CN'));
    }
    
    public function actionTesterror() {
        throw new \yii\web\NotFoundHttpException();
    }
    
    public function actionError() {
        Yii::trace('haha');
        echo $this->action->id;
        echo '<br>';
        echo $this->id;
    }
}
