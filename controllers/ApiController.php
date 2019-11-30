<?php

namespace app\controllers;

use app\core\helpers\LoginAuthFilter;
use app\core\containers\Constant;
use Trink\Core\Helper\Result;
use yii\web\Controller;

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

    public function successJson($msg = '', $data = [])
    {
        return $this->asJson(Result::success($msg, $data)->asArray());
    }

    public function failJson($msg = '', $debug = [], $status = 1)
    {
        return $this->asJson(Result::fail($msg, $debug, $status)->asArray());
    }

    public function listJson($list, $total, $pageSize = Constant::DEFAULT_PAGE_SIZE)
    {
        return $this->asJson(Result::lists($list, $total, $pageSize)->asArray());
    }

    public function actionDemo()
    {
        echo "Base Api Demo ...";
        echo "<br>";
    }

    public function actionTest()
    {
        echo "Base Api Test ...";
        echo "<br>";
    }
}
