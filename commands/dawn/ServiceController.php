<?php


namespace app\commands\dawn;

use app\modules\dawn\components\services\Goods;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class ServiceController extends Controller
{
    private $goodsService;

    public function __construct($id, $module, $config = [])
    {
        $this->goodsService = new Goods();
        parent::__construct($id, $module, $config);
    }

    /** 获取商品列表 */
    public function actionGoodsList()
    {
        $result = $this->goodsService->lists([], function (ActiveRecord $item) {
            return $item->getAttributes(['id']);
        });
        print_r($result->asArray());
        return ExitCode::OK;
    }

    /** 获取商品详情 */
    public function actionGoodsDetail()
    {
        $result = $this->goodsService->get(23, function (ActiveRecord $item) {
            return $item->getAttributes(null, ['is_delete']);
        }, function (ActiveQuery $query) {
            return $query->andFilterWhere(['is_delete' => 0]);
        });
        print_r($result->asArray());
        return ExitCode::OK;
    }
}
