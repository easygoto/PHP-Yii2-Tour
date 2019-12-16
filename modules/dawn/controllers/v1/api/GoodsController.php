<?php

namespace app\modules\dawn\controllers\v1\api;

use app\core\containers\Message;
use app\core\helpers\CheckTokenFilter;
use app\modules\dawn\controllers\ApiController;
use app\web\Yii;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;
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
     *     description="获取所有商品",
     *     path="/dawn/v1/api/goods/all/{limit}",
     *     @OA\Parameter(name="page", in="path", required=false, description="限度", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="{'status':0,'msg':'OK','data':{'list':[{'id':'2','name':'测试商品6177','wholesale':'421.30','sellingPrice':'490.24','marketPrice':'517.05','inventory':1200,'updatedAt':'2019-08-2114:05:54','operatedAt':'2019-08-2114:05:54','status':1},...],'limit':5,'total':78}}")
     * )
     *
     * @return Response
     */
    public function actionAll()
    {
        $params = Yii::$app->request->get();
        $result = $this->module->goodsService->allNotDelete($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Get(
     *     tags={"商品相关接口"},
     *     description="获取商品列表",
     *     path="/dawn/v1/api/goods/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=false, description="页码数", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="{'status':0,'msg':'OK','data':{'list':[{'id':'2','name':'测试商品6177','wholesale':'421.30','sellingPrice':'490.24','marketPrice':'517.05','inventory':1200,'updatedAt':'2019-08-21 14:05:54','operatedAt':'2019-08-21 14:05:54','status':1},...],'page':1,'total':78,'pagesize':10,'totalpages':8}}")
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
     *     description="获取商品详情",
     *     path="/dawn/v1/api/goods/{id}",
     *     @OA\Parameter(name="id", in="path", required=true, description="商品ID", @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="{'status':0,'msg':'OK','data':{'id':'2','name':'测试商品6177','wholesale':'421.30','sellingPrice':'490.24','marketPrice':'517.05',inventory':1200,'updatedAt':'2019-08-21 14:05:54','operatedAt':'2019-08-2114:05:54','status':1}}")
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
     *     description="添加商品",
     *     path="/dawn/v1/api/goods",
     *     @OA\JsonContent(
     *         @OA\Parameter(name="id", in="path", required=true, description="商品ID", @OA\Schema(type="integer")),
     *     ),
     *     @OA\Response(response=200, description="{'status':0,'msg':'OK','data':{'id':2,'name':'测试商品6177','wholesale':421.30,'sellingPrice':490.24,'marketPrice':517.05,'inventory':1200,'updatedAt':'2019-08-21 14:05:54','operatedAt':'2019-08-21 14:05:54','status':1}}")
     * )
     *
     * @return Response
     */
    public function actionCreate()
    {
        $params = json_decode(file_get_contents('php://input'), 1) ?: [];
        $params = Format::array2UnderScore($params);
        $result = $this->module->goodsService->addOne($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Put(
     *     tags={"商品相关接口"},
     *     description="修改商品",
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
        $result = $this->module->goodsService->editOneById((int)$id, $params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Patch(
     *     tags={"商品相关接口"},
     *     description="操作商品",
     *     path="/dawn/v1/api/goods/{id}",
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     * @param $verb
     *
     * @return Response
     */
    public function actionModify($id, $verb)
    {
        switch ($verb) {
            case 'enable':
                $result = $this->module->goodsService->enableById((int)$id);
                return $this->asJson($result->asCamelDataArray());
            case 'disable':
                $result = $this->module->goodsService->disableById((int)$id);
                return $this->asJson($result->asCamelDataArray());
            case 'remove':
                $result = $this->module->goodsService->removeById((int)$id);
                return $this->asJson($result->asCamelDataArray());
            default:
                return $this->asJson(Result::fail(Message::NO_SUCH_ACTION)->asArray());
        }
    }

    /**
     * @OA\Delete(
     *     tags={"商品相关接口"},
     *     description="删除商品",
     *     path="/dawn/v1/api/goods/{id}",
     *     @OA\Response(response=200, description="{'status':0,'msg':'商品已删除','data':[]}")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionDelete($id)
    {
        $result = $this->module->goodsService->deleteOneById((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }
}
