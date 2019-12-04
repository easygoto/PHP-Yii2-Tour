<?php


namespace app\commands\dawn;

use app\modules\dawn\core\services\GoodsService;
use yii\console\Controller;
use yii\console\ExitCode;

class GoodsController extends Controller
{
    private GoodsService $goodsService;

    public function __construct($id, $module, $config = [])
    {
        $this->goodsService = new GoodsService();
        parent::__construct($id, $module, $config);
    }

    /** 获取商品列表 */
    public function actionList()
    {
        $result = $this->goodsService->listsNotDelete();
        print_r($result->asArray());
        return ExitCode::OK;
    }

    /** 获取商品详情 */
    public function actionDetail()
    {
        $result = $this->goodsService->getByIdNotDelete(23);
        print_r($result->asArray());
        return ExitCode::OK;
    }
}
