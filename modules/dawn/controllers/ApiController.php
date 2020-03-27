<?php

namespace app\modules\dawn\controllers;

use app\modules\dawn\Module;

/**
 * @OA\Info(
 *   title="接口文档",
 *   version="1.0.0"
 * )
 */
class ApiController extends \app\controllers\ApiController
{
    /** @var Module $module */
    public $module;
}
