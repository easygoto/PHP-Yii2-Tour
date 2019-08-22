<?php

namespace app\modules\dawn\controllers\api;

use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\Goods;
use app\web\Yii;
use Exception;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Format;
use yii\web\Response;

class GoodsController extends ApiController
{
    /**
     * @OA\Get(
     *     tags={"商品相关接口"},
     *     path="/dawn/api/goods/{id}",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionView($id)
    {
        $goods = Goods::findOne($id);
        if (!$goods) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        return $this->successJson('', [
            'goods' => $goods->attributes,
        ]);
    }

    public function actionIndex($page = Constant::DEFAULT_PAGE)
    {
        // 构造条件
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;
        $goodsObj = Goods::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);
        if (!$goodsObj) {
            return $this->listJson([], 0);
        }

        // 关键信息
        $goodsTotal = $goodsObj->count('1');
        $goodsList = array_map(function (Goods $goods) {
            return $goods->getAttributes(null, ['is_delete']);
        }, $goodsObj->all());
        $goodsList = Format::array2CamelCase($goodsList);
        return $this->listJson($goodsList, $goodsTotal);
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
