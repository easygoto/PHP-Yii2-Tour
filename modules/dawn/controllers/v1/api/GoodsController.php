<?php

namespace app\modules\dawn\controllers\v1\api;

use app\core\helpers\CheckTokenFilter;
use app\modules\dawn\controllers\ApiController;
use app\web\Yii;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Format;
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
     *     path="/dawn/v1/api/goods/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=false, description="页码数", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="{'status':0,'msg'=>'success','data':{'list':[],'total':1,'pageTotals':1}}")
     * )
     *
     * @return Response
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        $result = $this->module->goodsService->listsNotDelete($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Get(
     *     tags={"商品相关接口"},
     *     path="/dawn/v1/api/goods/{id}",
     *     @OA\Parameter(name="id", in="path", required=true, description="商品ID", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="{'status':0,'msg'=>'success','data':{'id':1}}")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionView($id)
    {
        $result = $this->module->goodsService->getByIdNotDelete((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Post(
     *     tags={"商品相关接口"},
     *     path="/dawn/v1/api/goods/{id}",
     *     @OA\Response(response=200, description="")
     * )
     *
     * @return Response
     */
    public function actionCreate()
    {
        $params = Yii::$app->request->post();
        $params = Format::array2UnderScore($params);
        $result = $this->module->goodsService->add($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Put(
     *     tags={"商品相关接口"},
     *     path="/dawn/v1/api/goods/{id}",
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
        $params = Format::array2UnderScore($params);
        $result = $this->module->goodsService->edit((int)$id, $params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Delete(
     *     tags={"商品相关接口"},
     *     path="/dawn/v1/api/goods/{id}",
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionDelete($id)
    {
        $result = $this->module->goodsService->deleteById((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }
}
