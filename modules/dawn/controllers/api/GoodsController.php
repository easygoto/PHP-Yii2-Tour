<?php

namespace app\modules\dawn\controllers\api;

use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\models\Goods;
use app\web\Yii;
use yii\db\Exception;
use yii\db\Query;

class GoodsController extends ApiController
{

    /**
     * @OA\Get(
     *   tags={"商品相关接口"},
     *   path="/api/v1/product/{goodsId}",
     *   @OA\Parameter(name="goodsId",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *       response="default",
     *       description="successful operation"
     *   )
     * )
     */
    public function actionGet($id)
    {
        $id = max(0, (int)$id);
        if (!$id) {
            return $this->failJson('商品不存在(1)');
        }
        $goods = Goods::findOne($id);
        if (!$goods) {
            return $this->failJson('商品不存在(2)');
        }
        return $this->successJson('', [
            'goods' => $goods->attributes,
        ]);
    }

    public function actionIndex($page = 1)
    {
        $page = max(1, (int)$page);

        $query = new Query();
        $query->select('*');
        $query->from('`goods`');
        $query->where('is_delete=0');
        $total = $query->count();
        $query->limit(Constant::DEFAULT_PAGE_SIZE);
        $query->offset(($page - 1) * Constant::DEFAULT_PAGE_SIZE);
        $list = $query->all();

        return $this->listJson($list, $total);
    }

    public function actionCreate()
    {
        $data        = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $goods = new Goods;

            $now                  = date('Y-m-d H:i:s');
            $goods->name          = $this->trimValue($data, 'name');
            $goods->wholesale     = isset($data['wholesale']) ? (float)($data['wholesale']) : 0;
            $goods->selling_price = isset($data['selling_price']) ? (float)($data['selling_price']) : 0;
            $goods->market_price  = isset($data['market_price']) ? (float)($data['market_price']) : 0;
            $goods->inventory     = isset($data['inventory']) ? (int)($data['inventory']) : 0;
            $goods->created_at    = $now;
            $goods->updated_at    = $now;
            $goods->operated_at   = $now;
            $goods->status        = 1;
            $goods->is_delete     = 0;

            if (!$goods->save()) {
                throw new Exception('未保存成功');
            }

            $transaction->commit();
            return $this->successJson('保存成功');
        } catch (\Exception $e) {
            $transaction->rollBack();
            return $this->failJson($e->getMessage());
        }
    }

    private function trimValue($arr, $key)
    {
        if (!isset($arr[$key])) {
            return null;
        }
        if (is_string($arr[$key])) {
            return trim($arr[$key]);
        }
        return $arr[$key];
    }
}
