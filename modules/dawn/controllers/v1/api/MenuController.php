<?php


namespace app\modules\dawn\controllers\v1\api;

use app\core\containers\Message;
use app\modules\dawn\controllers\ApiController;
use app\web\Yii;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Format;
use Trink\Core\Helper\Result;
use yii\web\Response;

class MenuController extends ApiController
{
    /**
     * @OA\Get(
     *     tags={"菜单相关接口"},
     *     description="获取所有菜单",
     *     path="/dawn/v1/api/menu/all/{limit}"
     * )
     *
     * @return Response
     */
    public function actionAll()
    {
        $params = Yii::$app->request->get();
        $result = $this->module->menuService->allWithStratify($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Get(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @return Response
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        $result = $this->module->menuService->lists($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Get(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/{id}",
     *     @OA\Parameter(name="id", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionView($id)
    {
        $result = $this->module->menuService->getById((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Post(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu",
     *     @OA\Parameter(name="pid", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="sn", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="name", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="url", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="sort", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="icon",in="path",required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="status",in="path",required=false, @OA\Schema(type="integer", enum={1,2})),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @return Response
     */
    public function actionCreate()
    {
        $params = json_decode(file_get_contents('php://input'), 1) ?: [];
        $params = Format::array2UnderScore($params);
        $result = $this->module->menuService->addOne($params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Put(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/{id}",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="pid", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="sn", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="name", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="url", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="sort", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="icon", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="status", in="path", required=false, @OA\Schema(type="integer", enum={1,2})),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $params = json_decode(file_get_contents('php://input'), 1) ?: [];
        $params = Format::array2UnderScore($params);
        $result = $this->module->menuService->editOneById((int)$id, $params);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Patch(
     *     tags={"菜单相关接口"},
     *     description="操作菜单",
     *     path="/dawn/api/menu/{id}"
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
                $result = $this->module->menuService->enableById((int)$id);
                return $this->asJson($result->asCamelDataArray());
            case 'disable':
                $result = $this->module->menuService->disableById((int)$id);
                return $this->asJson($result->asCamelDataArray());
            default:
                return $this->asJson(Result::fail(Message::NO_SUCH_ACTION)->asArray());
        }
    }

    /**
     * @OA\Delete(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/{id}",
     *     @OA\Parameter(name="id", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionDelete($id)
    {
        $result = $this->module->menuService->deleteOneById((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }
}
