<?php

namespace app\modules\dawn\controllers\api_v1;

use app\modules\dawn\controllers\ApiController;
use app\web\Yii;

class GoodsController extends ApiController
{
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        return $this->asJson($params);
    }
}
