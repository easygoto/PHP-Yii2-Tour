<?php

namespace app\modules\dawn\controllers\api;

use app\behaviors\utils\BaseUtil;
use app\behaviors\utils\CheckUtil;
use app\modules\dawn\behaviors\services\UserService;
use app\modules\dawn\behaviors\utils\UserUtil;
use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\User;
use app\web\Yii;
use yii\web\Response;

class UserController extends ApiController
{
    public function actionView($id = 0)
    {
        $userObj = User::findOne($id);
        if (!$userObj) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        if ($userObj->is_delete === Constant::DEFAULT_IS_DELETE) {
            return $this->failJson(Message::DELETED);
        }
        $user = $userObj->getAttributes(null, ['secret_code', 'deleted']);
        return $this->successJson(Message::SUCCESS, $user);
    }

    /**
     * @OA\Get(
     *   tags={"用户相关接口"},
     *   path="/dawn/api/user/list/{page}",
     *   @OA\Parameter(name="page",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *       response="default",
     *       description="successful operation"
     *   )
     * )
     *
     * @param int $page
     *
     * @return Response
     */
    public function actionIndex($page = Constant::DEFAULT_PAGE)
    {
        $keywords = Yii::$app->request->get();
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;
        $userObj = User::find();
        foreach ($keywords as $key => $value) {
            if ($key == 'status' && array_key_exists($value, UserUtil::STATUS)) {
                $userObj = $userObj->where(['status' => UserUtil::STATUS[$value]]);
            }
        }
        $userObj = $userObj->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);

        $userTotal = $userObj->count('1');
        $userList = [];
        foreach ($userObj->all() as $user) {
            $userList[] = $user->getAttributes(null, ['secret_code', 'is_delete']);
        }
        return $this->listJson($userList, $userTotal);
    }

    /**
     * @OA\Post(
     *   tags={"用户相关接口"},
     *   path="/dawn/api/user",
     *   @OA\Parameter(name="user_name",
     *     in="path",
     *     required=true,
     *     description="用户名",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Parameter(name="real_name",
     *     in="path",
     *     required=false,
     *     description="真实姓名",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Parameter(name="gender",
     *     in="path",
     *     required=false,
     *     description="0(女),1(男),2(未知)",
     *     @OA\Schema(
     *       type="integer",
     *       enum={0, 1, 2}
     *     )
     *   ),
     *   @OA\Parameter(name="mobile_number",
     *     in="path",
     *     required=true,
     *     description="手机号码",
     *     @OA\Schema(type="mobile")
     *   ),
     *   @OA\Response(
     *       response="default",
     *       description="successful operation"
     *   )
     * )
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $data    = $request->post();

        // check data
        $check_result = CheckUtil::verify($data, [
            'user_name'     => ['label' => '用户名', 'type' => 'string'],
            'mobile_number' => ['label' => '手机号', 'type' => 'mobile'],
        ]);
        if (!BaseUtil::getTrimValue($check_result, 'success')) {
            return $this->failJson($check_result);
        }

        // add to db
        $result = UserService::add($data);
        if ($result->isFail()) {
            return $this->failJson($result);
        }
        return $this->successJson(Message::CREATE_SUCCESS, $result);
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        if ($request->isPut) {
            $data = $request->bodyParams;
//            UserService::edit();
            return $this->successJson(Message::UPDATE_SUCCESS, $data);
        } elseif ($request->isPatch) {
            $data = $request->bodyParams;
            return $this->successJson(Message::UPDATE_SUCCESS, $data);
        } else {
            return $this->failJson('未接受的请求');
        }
    }

    public function actionDelete($id = 0)
    {
        $user = User::findOne($id);
        if (!$user) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $user->is_delete = 1;
        if (!$user->save(true, ['is_delete'])) {
            return $this->failJson(Message::DELETE_FAIL, $user->getErrors());
        }
        return $this->successJson(Message::DELETE_SUCCESS);
    }
}
