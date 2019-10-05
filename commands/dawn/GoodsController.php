<?php


namespace app\commands\dawn;

use app\modules\dawn\components\services\Goods as GoodsService;
use app\modules\dawn\helpers\Constant;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class GoodsController extends Controller
{
    private $goodsService;

    public function __construct($id, $module, $config = [])
    {
        $this->goodsService = new GoodsService();
        parent::__construct($id, $module, $config);
    }

    /** 获取商品列表 */
    public function actionList()
    {
        $result = $this->goodsService->lists([], function (ActiveRecord $item) {
            return $item->getAttributes(['id']);
        });
        print_r($result->asArray());
        return ExitCode::OK;
    }

    /** 获取商品详情 */
    public function actionDetail()
    {
        $result = $this->goodsService->get(23, function (ActiveRecord $item) {
            return $item->getAttributes(null, ['is_delete']);
        }, function (ActiveQuery $query) {
            return $query->andFilterWhere(['is_delete' => Constant::NOT_DELETE]);
        });
        print_r($result->asArray());
        return ExitCode::OK;
    }
}
