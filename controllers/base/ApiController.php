<?php

namespace app\controllers\base;

use app\filters\LoginAuthFilter;
use app\utils\RetUtil;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\NotFoundHttpException;

/**
 * @OA\Info(
 *   title="接口文档",
 *   version="1.0.0"
 * )
 */
class ApiController extends Controller
{
    public $defaultAction = 'index';

    // 过滤器
    public function behaviors()
    {
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

    public function successJson($data = [], $msg = '', $debug = [])
    {
        return $this->asJson(RetUtil::success($data, $msg, $debug));
    }

    public function failJson($msg = '', $data = [], $debug = [])
    {
        return $this->asJson(RetUtil::fail($msg, $data, $debug));
    }

    public function actionSendjson()
    {
        $this->asJson([
            'controllerId' => $this->id,
            'route'        => $this->route,
            'basePath'     => \Yii::$app->basePath,
        ]);
    }

    public function actionIndex()
    {
        echo "Join Base Api ...";
        echo "<br>";
    }

    public function actionDemo()
    {
        echo "Base Api Demo ...";
        echo "<br>";
        echo "<a href='" . Url::to(['api/user/get', 'id' => 10]) . "'>api/user/get?id=10</a>";
        echo "<br>";
    }
    
    public function actionTest()
    {
        echo "Base Api Test ...";
        echo "<br>";
    }

    public function actionSession()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->set('haha', 'haha');
        echo $session->get('haha');
        $session->close();
        if ($session->isActive) {
            $session->destroy();
        }
    }

    public function actionSetcookie()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name'  => 'language',
            'value' => 'zh-CN',
        ]));
    }

    public function actionCookie()
    {
        // 只能获取后端设置的 cookie
        $cookies = Yii::$app->request->cookies;
        var_dump($cookies->getValue('language', 'zh-CN'));
    }

    public function actionTesterror()
    {
        throw new NotFoundHttpException();
    }

    public function actionError()
    {
        Yii::trace('haha');
        echo $this->action->id;
        echo '<br>';
        echo $this->id;
    }

    public function actionDemoredis()
    {
        echo '<pre>';
        $redis  = Yii::$app->redis;
        $result = $redis->hmset('test_collection', 'key1', 'val1', 'key2', 'val2');
        print_r($result);
    }

    public function actionWelcome()
    {
        $this->asJson([$this->action->id => (new TestComponent())->welcome(Yii::$app->request->get('name'))]);
    }

    public function actionRedirect()
    {
        Yii::$app->response->redirect("http://www.example.com");
    }
}
