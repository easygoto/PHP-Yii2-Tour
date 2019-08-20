<?php

namespace app\modules\dawn\controllers\api;

use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\Goods;
use app\web\Yii;
use Exception;
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
    public function actionView($id)
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
        $params = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $goods = new Goods;
        try {
            $goods->setAttributes($params);
            $now = date('Y-m-d H:i:s');
            $goods->created_at = $now;
            $goods->updated_at = $now;
            $goods->operated_at = $now;
            if (!$goods->save()) {
                throw new Exception(Message::CREATE_FAIL);
            }
            $transaction->commit();
            return $this->successJson(Message::CREATE_SUCCESS);
        } catch (Exception $e) {
            $transaction->rollBack();
            return $this->failJson($e->getMessage(), $goods->getErrors());
        }
    }
}
