<?php

namespace app\modules\dawn\controllers\api;

use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\behaviors\services\UserService;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\User;
use app\modules\dawn\behaviors\utils\UserUtil;
use app\behaviors\utils\BaseUtil;
use app\behaviors\utils\CheckUtil;
use app\web\Yii;
use yii\web\Response;

class UserController extends ApiController
{
    public function actionGet($id = 0)
    {
        $id = (int)$id;
        if (!$id) {
            return $this->failJson('用户不存在(1)', ['id' => $id]);
        }

        $user = User::findOne($id);
        if (!$user) {
            return $this->failJson('用户不存在(2)', ['user' => $user]);
        }
        if ($user->deleted === Constant::DEFAULT_IS_DELETE) {
            return $this->failJson('用户不存在(3)', ['user' => $user]);
        }

        $user = UserUtil::toArray($user, 'detail');

        return $this->successJson($user);
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
     * @param int $page
     *
     * @return Response
     */
    public function actionIndex($page = Constant::DEFAULT_PAGE)
    {
        $keywords = Yii::$app->request->get();

        $result    = UserService::lists($keywords, $page);
        $user_list = BaseUtil::getTrimValue($result->asArray(), 'list', []);
        foreach ($user_list as & $user) {
            $user = UserUtil::toArray($user, 'list');
        }

        return $this->successJson(Message::SUCCESS, $result);
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
        if (!BaseUtil::getTrimValue($result->asArray(), 'success')) {
            return $this->failJson($result);
        }
        return $this->successJson(Message::ADD_SUCCESS, $result);
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        if ($request->isPut) {
            $data = $request->bodyParams;
//            UserService::edit();
            return $this->successJson(Message::EDIT_SUCCESS, $data);
        } elseif ($request->isPatch) {
            $data = $request->bodyParams;
            return $this->successJson(Message::EDIT_SUCCESS, $data);
        } else {
            return $this->failJson('未接受的请求');
        }
    }

    public function actionDelete($id = 0)
    {
        $id = max(0, (int)$id);
        if (!$id) {
            return $this->failJson('用户不存在(1)', ['id' => $id]);
        }

        $user = User::findOne($id);
        if (!$user) {
            return $this->failJson('用户不存在(2)', ['user' => $user]);
        }

        $user->deleted = 1;

        if (!$user->save()) {
            return $this->failJson('未删除成功', $user->getErrors());
        }

        return $this->successJson(Message::DELETE_SUCCESS, ['user' => $user]);
    }
}
