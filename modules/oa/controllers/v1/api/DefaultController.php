<?php


namespace app\modules\oa\controllers\v1\api;

use app\modules\oa\controllers\ApiController;

class DefaultController extends ApiController
{
    public function actionIndex()
    {
        return $this->asJson(['status' => 0, 'msg' => '', 'data' => []]);
    }
}
