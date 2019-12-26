<?php


namespace app\modules\dawn\controllers\v1\api;

use app\modules\dawn\controllers\ApiController;
use app\web\Yii;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Format;
use yii\web\Response;

class UserController extends ApiController
{
    /**
     * @OA\Get(
     *     tags={"用户相关接口"},
     *     path="/dawn/api/user/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @return Response
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        $result = $this->module->userService->listsNotDelete($params);
        return $this->asJson($result->asCamelDataArray());
    }

    public function actionView($id)
    {
        $result = $this->module->userService->getByIdNotDelete((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }

    /**
     * @OA\Post(
     *     tags={"用户相关接口"},
     *     path="/dawn/api/user",
     *     @OA\Parameter(name="user_name", in="path", required=true, description="用户名", @OA\Schema(type="string")),
     *     @OA\Parameter(name="real_name", in="path", required=false, description="真实姓名", @OA\Schema(type="string")),
     *     @OA\Parameter(name="gender", in="path", required=false, description="0(女),1(男),2(未知)", @OA\Schema(
     *                                  type="integer", enum={0, 1, 2})),
     *     @OA\Parameter(name="mobile_number", in="path", required=true, description="手机号码",
     *                                         @OA\Schema(type="mobile")),
     *     @OA\Response(response=200, description="")
     * )
     */
    public function actionCreate()
    {
        $params = json_decode(file_get_contents('php://input'), 1) ?: [];
        $params = Format::array2UnderScore($params);
        $result = $this->module->userService->addOne($params);
        return $this->asJson($result->asCamelDataArray());
    }

    public function actionUpdate($id)
    {
        $params = json_decode(file_get_contents('php://input'), 1) ?: [];
        $params = Format::array2UnderScore($params);
        $result = $this->module->userService->editOneById((int)$id, $params);
        return $this->asJson($result->asCamelDataArray());
    }

    public function actionDelete($id)
    {
        $result = $this->module->userService->deleteOneById((int)$id);
        return $this->asJson($result->asCamelDataArray());
    }
}
