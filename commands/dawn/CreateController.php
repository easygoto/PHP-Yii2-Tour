<?php


namespace app\commands\dawn;

use app\modules\dawn\helpers\Constant;
use app\modules\dawn\models\Goods;
use yii\console\Controller;
use yii\console\ExitCode;

class CreateController extends Controller
{
    public function actionGoods($nums = 100)
    {
        print "create goods start ...\n";
        for ($i = 0; $i < $nums; $i ++) {
            $price = rand(200, 999);
            $now = date('Y-m-d H:i:s');
            $sn = substr(md5(uniqid()), 0, 4);

            $goods = new Goods();
            $goods->name = '测试商品' . $sn;
            $goods->wholesale = $price * 1.1;
            $goods->selling_price = $price * 1.28;
            $goods->market_price = $price * 1.35;
            $goods->inventory = rand(2, 12) * 100;
            $goods->created_at = $now;
            $goods->status = Goods::STATUS['NORMAL'];
            $goods->is_delete = Constant::DEFAULT_NOT_DELETE;
            $goods->save();
        }
        print "create goods done ...\n";
        return ExitCode::OK;
    }
}
