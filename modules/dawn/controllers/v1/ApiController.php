<?php

namespace app\modules\dawn\controllers\v1;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\Module;

/**
 * @OA\Info(
 *   title="接口文档",
 *   version="1.0.0"
 * )
 */
class ApiController extends \app\controllers\ApiController
{
    /** @var Module */
    public $module;

    public function listJson($list, $total, $pageSize = Constant::DEFAULT_PAGE_SIZE)
    {
        return parent::listJson($list, $total, $pageSize);
    }
}
