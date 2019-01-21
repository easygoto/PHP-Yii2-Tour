<?php

namespace app\controllers\api;

use Yii;
use app\models\api\User;
use app\utils\BaseUtil;
use app\utils\CheckUtil;
use app\utils\api\UserUtil;
use app\service\api\UserService;
use app\controllers\base\ApiController;

class UserController extends ApiController {
    
    public function actionGet($id = 0) {
        
        $id = (int)$id;
        if (! $id) {
            return $this->failJson('用户不存在(1)', [], ['id' => $id]);
        }
        
        $user = User::findOne($id);
        if (! $user) {
            return $this->failJson('用户不存在(2)', [], ['user' => $user]);
        }
        if ($user->deleted === DEFAULT_DELETED) {
            return $this->failJson('用户不存在(3)', [], ['user' => $user]);
        }
        
        $user = UserUtil::toArray($user, 'detail');
        
        return $this->successJson($user);
    }
    
    public function actionList($page = DEFAULT_PAGE, $page_size = DEFAULT_PAGE_SIZE) {
        
        $keywords = Yii::$app->request->get();
        
        $result    = UserService::lists($keywords, $page, $page_size);
        $user_list = BaseUtil::getTrimValue($result, 'list', []);
        foreach ($user_list as & $user) {
            $user = UserUtil::toArray($user, 'list');
        }
        
        return $this->successJson($result, '', $keywords);
    }
    
    public function actionCreate() {
        $request = Yii::$app->request;
        $data    = $request->post();
        
        // check data
        $check_result = CheckUtil::verify($data, [
            'user_name'     => ['label' => '用户名', 'type' => 'string'],
            'mobile_number' => ['label' => '手机号', 'type' => 'mobile'],
        ]);
        if (! BaseUtil::getTrimValue($check_result, 'success')) {
            return $this->failJson($check_result);
        }
        
        // add to db
        $result = UserService::add($data);
        if (! BaseUtil::getTrimValue($result, 'success')) {
            return $this->failJson($result);
        }
        return $this->successJson($result);
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
        $id = (int)$id;
        if (! $id) {
            return $this->failJson('用户不存在(1)', [], ['id' => $id]);
        }
        
        $user = User::findOne($id);
        if (! $user) {
            return $this->failJson('用户不存在(2)', [], ['user' => $user]);
        }
        
        $user->deleted = 1;
        
        if (! $user->save()) {
            return $this->failJson('未删除成功', [], $user->getErrors());
        }
        
        return $this->successJson(['id' => $user->id]);
    }
}
