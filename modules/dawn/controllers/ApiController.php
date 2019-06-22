<?php

namespace app\modules\dawn\controllers;

use app\modules\dawn\helpers\Constant;

class ApiController extends \app\controllers\ApiController
{
    public function listJson($list, $total, $pageSize = Constant::DEFAULT_PAGE_SIZE)
    {
        return parent::listJson($list, $total, $pageSize);
    }
}
