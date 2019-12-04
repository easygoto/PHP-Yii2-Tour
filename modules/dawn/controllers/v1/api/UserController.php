<?php

namespace app\modules\dawn\controllers\v1\api;

use app\core\containers\Message;
use app\modules\dawn\core\containers\Constant;
use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\models\User;
use app\web\Yii;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Arrays;
use Trink\Core\Helper\Result;
use yii\db\Exception;
use yii\web\Response;

class UserController extends ApiController
{
    public function actionView($id = 0)
    {
        $userObj = User::findOne($id);
        if (!$userObj) {
            return $this->asJson(Result::fail(Message::NOT_EXISTS)->asArray());
        }
        if ($userObj->is_delete === Constant::IS_DELETE) {
            return $this->asJson(Result::fail(Message::DELETED)->asArray());
        }
        $user = $userObj->getAttributes(null, ['secret_code', 'deleted']);
        return $this->asJson(Result::success(Message::SUCCESS, $user)->asArray());
    }

    /**
     * @OA\Get(
     *     tags={"用户相关接口"},
     *     path="/dawn/api/user/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
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
            if ($key == 'status' && ($statusValue = Arrays::get(User::STATUS, $value))) {
                $userObj = $userObj->where(['status' => $statusValue]);
            }
        }
        $userObj = $userObj->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);

        $userTotal = $userObj->count('1');
        $userList = [];
        foreach ($userObj->all() as $user) {
            $userList[] = $user->getAttributes(null, ['secret_code', 'is_delete']);
        }
        return $this->asJson(Result::lists($userList, $userTotal, $page)->asArray());
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
        $params = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $user = new User;
        try {
            $user->setAttributes($params);
            $user->created_at = date('Y-m-d H:i:s');
            if (!$user->save()) {
                throw new Exception(Message::CREATE_FAIL);
            }
            $transaction->commit();
            return $this->asJson(Result::success(Message::CREATE_SUCCESS, ['id' => $user->id])->asArray());
        } catch (Exception $e) {
            $transaction->rollBack();
            return $this->asJson(Result::fail($e->getMessage(), $user->getErrors())->asArray());
        }
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        if ($request->isPut) {
            $data = $request->bodyParams;
            //            UserService::edit();
            return $this->asJson(Result::success(Message::UPDATE_SUCCESS, $data)->asArray());
        } elseif ($request->isPatch) {
            $data = $request->bodyParams;
            return $this->asJson(Result::success(Message::UPDATE_SUCCESS, $data)->asArray());
        } else {
            return $this->asJson(Result::fail('未接受的请求')->asArray());
        }
    }

    public function actionDelete($id = 0)
    {
        $user = User::findOne($id);
        if (!$user) {
            return $this->asJson(Result::fail(Message::NOT_EXISTS)->asArray());
        }
        $user->is_delete = 1;
        if (!$user->save(true, ['is_delete'])) {
            return $this->asJson(Result::fail(Message::DELETE_FAIL, $user->getErrors())->asArray());
        }
        return $this->asJson(Result::success(Message::DELETE_SUCCESS)->asArray());
    }
}
