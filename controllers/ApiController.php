<?php

namespace app\controllers;

use app\core\helpers\LoginAuthFilter;
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
                'class'  => LoginAuthFilter::class,
                'only'   => ['demo'],
                'except' => ['test'],
            ],
        ];
    }

    public function actionDemo()
    {
        echo "Base Api Demo ...<br>";
    }

    public function actionTest()
    {
        echo "Base Api Test ...<br>";
    }
}
