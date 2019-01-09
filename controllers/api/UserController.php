<?php

namespace app\controllers\api;

use Yii;
use yii\db\Exception;
use app\models\api\User;
use app\utils\api\UserUtil;
use app\service\api\UserService;
use app\controllers\base\ApiController;

class UserController extends ApiController {
    
    public function actionGet($id=0) {
        
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
    
    public function actionList($page=1, $pageSize=10) {
        // 如果该查询没有结果则返回空数组
        $sql = 'SELECT * FROM `user` WHERE `status`=:status AND `deleted`=:deleted';
        $userList = Yii::$app->db->createCommand($sql)
            ->bindValue(':status', 1)
            ->bindValue(':deleted', 0)
            ->queryAll();
    
        // 返回一个标量值
        // 如果该查询没有结果则返回 false
        $sql = 'SELECT COUNT(1) FROM `user` WHERE `status`=:status AND `deleted`=:deleted';
        $total = Yii::$app->db->createCommand($sql)
            ->bindValue(':status', 1)
            ->bindValue(':deleted', 0)
            ->queryScalar();
    
        $pageTotal = 0;
        
        $this->asJson([
            'page' => $page,
            'pageSize' => $pageSize,
            'pageTotal' => $pageTotal,
            'total' => $total,
            'userList' => $userList,
        ]);
    }
    
    public function actionUpdate() {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            UserService::add($data);
        } else if ($request->isPut) {
            $data = $request->bodyParams;
            $this->successJson($data);
        }
    }
    
    public function actionDelete() {
        $this->successJson('delete me? you are a big !');
    }
}
