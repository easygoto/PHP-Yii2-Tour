<?php


namespace app\modules\dawn\controllers\page;

use app\modules\dawn\controllers\PageController;
use app\modules\dawn\models\Goods;

class DataController extends PageController
{
    public function actionGoods()
    {
        for ($i = 0; $i < 100; $i ++) {
            $price = rand(200, 999);
            $now   = date('Y-m-d H:i:s');
            $sn    = substr(md5(uniqid()), 0, 4);

            $goods = new Goods();
            $goods->setAttributes([
                'name'          => '测试商品' . $sn,
                'wholesale'     => $price * 1.1,
                'selling_price' => $price * 1.28,
                'market_price ' => $price * 1.35,
                'inventory'     => rand(2, 12) * 100,
                'created_at'    => $now,
                'updated_at'    => $now,
                'operated_at'   => $now,
                'status'        => 1,
                'is_delete'     => 0,
            ]);
            $goods->save();
        }
        return 'ok';
    }
}
