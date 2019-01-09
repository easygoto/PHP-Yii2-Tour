<?php

namespace app\controllers\api;

use Yii;
use yii\db\Exception;
use app\models\api\User;
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
    
    public function actionList($page, $pageSize) {
        
        // 如果该查询没有结果则返回空数组
        $sql      = 'SELECT * FROM `user` WHERE `status`=:status AND `deleted`=:deleted';
        $userList = Yii::$app->db->createCommand($sql)
            ->bindValue(':status', 1)
            ->bindValue(':deleted', 0)
            ->queryAll();
        
        // 返回一个标量值
        // 如果该查询没有结果则返回 false
        $sql   = 'SELECT COUNT(1) FROM `user` WHERE `status`=:status AND `deleted`=:deleted';
        $total = Yii::$app->db->createCommand($sql)
            ->bindValue(':status', 1)
            ->bindValue(':deleted', 0)
            ->queryScalar();
        
        $pageTotal = 0;
        
        $this->asJson([
            'page'      => $page,
            'pageSize'  => $pageSize,
            'pageTotal' => $pageTotal,
            'total'     => $total,
            'userList'  => $userList,
        ]);
    }
    
    public function actionCreate() {
        $request = Yii::$app->request;
        $data    = $request->post();
//        UserService::add($data);
        return $this->successJson($data);
    }
    
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        if ($request->isPut) {
            $data = $request->bodyParams;
            return $this->successJson($data, ['id' => $id, 'method' => 'put']);
        } else if ($request->isPatch) {
            $data = $request->bodyParams;
            return $this->successJson($data, ['id' => $id, 'method' => 'patch']);
        } else {
            return $this->failJson('未接受的请求');
        }
    }
    
    public function actionDelete($id = 0) {
        $this->successJson([
            'id'  => $id,
            'msg' => 'delete me? you are a big !',
        ]);
    }
}
