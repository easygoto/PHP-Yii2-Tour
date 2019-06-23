<?php

namespace app\modules\dawn\controllers;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\Module;

class ApiController extends \app\controllers\ApiController
{
    /** @var Module */
    public $module;

    public function listJson($list, $total, $pageSize = Constant::DEFAULT_PAGE_SIZE)
    {
        return parent::listJson($list, $total, $pageSize);
    }
}
