<?php

namespace app\controllers\api;

use Yii;
use app\models\api\User;
use app\utils\CheckUtil;
use app\utils\api\UserUtil;
use app\service\api\UserService;
use app\controllers\base\ApiController;

class UserController extends ApiController {
    
    public function actionGet($id) {
        
        $id = (int)$id;
        if (! $id) {
            return $this->failJson('用户不存在(1)', ['id' => $id]);
        }
        
        $user = User::findOne($id);
        if (! $user) {
            return $this->failJson('用户不存在(2)', ['user' => $user]);
        }
        
        $user = UserUtil::toArray($user, 'detail');
        
        return $this->successJson($user);
    }
    
    public function actionList($page, $page_size = DEFAULT_PAGE_SIZE) {
        
        $data   = Yii::$app->request->get();
        $result = UserService::lists($data, $page, $page_size);
        
        if (! isset($result['list']) || empty($result['list'])) {
            return $this->failJson('列表获取出现错误');
        }
        
        foreach ($result['list'] as & $row) {
            $row = UserUtil::toArray($row, 'list');
        }
        
        return $this->successJson($result, $data);
    }
    
    public function actionCreate() {
        $request      = Yii::$app->request;
        $data         = $request->post();
        $check_result = CheckUtil::verify($data, [
            'user_name'     => ['type' => 'string', 'label' => '用户名'],
            'mobile_number' => ['type' => 'mobile', 'label' => '手机号'],
        ]);
        $result       = UserService::add($data);
        return $this->successJson([
            'check_result' => $check_result,
            'result'       => $result,
        ]);
    }
    
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        if ($request->isPut) {
            $data = $request->bodyParams;
//            UserService::edit();
            return $this->successJson($data, ['id' => $id, 'method' => 'put']);
        } else if ($request->isPatch) {
            $data = $request->bodyParams;
            return $this->successJson($data, ['id' => $id, 'method' => 'patch']);
        } else {
            return $this->failJson('未接受的请求');
        }
    }
    
    public function actionDelete($id = 0) {
        if ((int)$id) {
            return $this->failJson('用户不存在');
        }
        $result = UserService::delete($id);
        return $this->successJson([
            'id'  => $id,
            'msg' => 'delete me? you are a big !',
        ]);
    }
}
