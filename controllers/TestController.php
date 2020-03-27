<?php

namespace app\controllers;

use app\web\Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionRedis()
    {
        $redis = Yii::$app->redis;
        $result = $redis->hmset('test_collection', 'key1', 'val1', 'key2', 'val2');
        $keyList = $redis->hmget('test_collection', 'key1', 'key2');
        $this->asJson(['result' => $result, 'keyList' => $keyList]);
    }
}
