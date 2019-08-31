<?php

namespace app\modules\dawn\controllers\api;

use app\modules\dawn\behaviors\CheckTokenFilter;
use app\modules\dawn\controllers\ApiController;
use app\web\Yii;
use OpenApi\Annotations as OA;
use yii\web\Response;

class GoodsController extends ApiController
{
    public function behaviors()
    {
        return [
            [
                'class'  => CheckTokenFilter::class,
                'only'   => ['create', 'update', 'delete'],
                'except' => ['view', 'index'],
            ],
        ];
    }

    /**
     * @OA\Get(
     *     tags={"商品相关接口"},
     *     path="/dawn/api/goods/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="{'status':0,'message'=>'success','data':{'list':[],'total':1,'pageTotals':1}}")
     * )
     *
     * @return Response
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        $result = $this->module->goodsService->lists($params);
        return $this->asJson($result->asArray());
    }

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
        $result = $this->module->goodsService->get($id);
        return $this->asJson($result->asArray());
    }

    /**
     * @OA\Post(
     *     tags={"商品相关接口"},
     *     path="/dawn/api/goods/{id}",
     *     @OA\Response(response=200, description="")
     * )
     *
     * @return Response
     */
    public function actionCreate()
    {
        $params = Yii::$app->request->post();
        $result = $this->module->goodsService->add($params);
        return $this->asJson($result->asArray());
    }

    /**
     * @OA\Put(
     *     tags={"商品相关接口"},
     *     path="/dawn/api/goods/{id}",
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $params = Yii::$app->request->post();
        $result = $this->module->goodsService->edit($id, $params);
        return $this->asJson($result->asArray());
    }

    /**
     * @OA\Delete(
     *     tags={"商品相关接口"},
     *     path="/dawn/api/goods/{id}",
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionDelete($id)
    {
        $result = $this->module->goodsService->del($id);
        return $this->asJson($result->asArray());
    }
}
