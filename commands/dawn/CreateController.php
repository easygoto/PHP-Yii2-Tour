<?php

namespace app\commands\dawn;

use app\modules\dawn\models\Goods;
use app\modules\dawn\models\Menu;
use yii\console\Controller;
use yii\console\ExitCode;

class CreateController extends Controller
{
    public function actionGoods($nums = 100)
    {
        print "create goods ... ";
        for ($i = 0; $i < $nums; $i++) {
            $price = rand(200, 999);
            $nowTime = time();
            $sn = substr(md5(uniqid()), 0, 4);

            $goods = new Goods();
            $goods->name = '测试商品' . $sn;
            $goods->wholesale = $price * 1.1;
            $goods->selling_price = $price * 1.28;
            $goods->market_price = $price * 1.35;
            $goods->inventory = rand(2, 12) * 100;
            $goods->created_at = date('Y-m-d H:i:s', $nowTime - 42 * 86400);
            $goods->updated_at = rand(100, 999) > 600 ? null : date('Y-m-d H:i:s', $nowTime + rand(86400 * rand(0, 30)));
            $goods->operated_at = rand(100, 999) > 400 ? null : date('Y-m-d H:i:s', $nowTime + rand(86400 * rand(0, 20)));
            $goods->status = (array_values(Goods::STATUS))[rand(0, count(Goods::STATUS) - 1)];
            $goods->is_delete = rand(100, 999) > 800;
            $goods->save();
        }
        print "[OK]\n";
        return ExitCode::OK;
    }

    public function actionMenu()
    {
        print "create menu ... ";
        $data = file_get_contents(__DIR__ . '/menu.json');
        $data = json_decode($data, 1);
        foreach ($data['RECORDS'] as $row) {
            $sn = substr(md5(uniqid()), 0, 4);
            $menu = new Menu();
            $menu->id = $row['id'];
            $menu->pid = $row['pid'];
            $menu->sn = $sn;
            $menu->name = $row['name'];
            $menu->url = $row['url'];
            $menu->sort = $row['sort'];
            $menu->icon = $row['icons'];
            $menu->status = $row['status'];
            $menu->save();
        }
        print "[OK]\n";
        return ExitCode::OK;
    }
}
