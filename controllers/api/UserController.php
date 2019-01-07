<?php

namespace app\controllers\api;

use Yii;
use yii\db\Exception;
use app\models\User;
use app\utils\UserUtil;
use app\controllers\base\ApiController;

class UserController extends ApiController {
    
    public function actionGet($id=0) {
        
        $user = User::findOne($id);
        if (! $user) {
            $this->failJson('用户不存在'); return;
        }
        
        $user = UserUtil::toArray($user, 'detail');
        
        $this->successJson($user);
    }
    
    public function actionList($page=1) {
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
    
        // 返回一列 (第一列)
        // 如果该查询没有结果则返回空数组
        $sql = 'SELECT `user_name` FROM `user`';
        $userNameList = Yii::$app->db->createCommand($sql)
            ->queryColumn();
        
        $this->asJson([
            'page' => $page,
            'total' => $total,
            'userList' => $userList,
            'userNameList' => $userNameList,
        ]);
    }
    
    public function actionAdd() {
        $data = Yii::$app->request->post();
        
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $postFix = md5(microtime(true));
            
            $user = new User;
    
            $user->user_name = 'admin'.$postFix;
            $user->real_name = 'admin'.$postFix;
            $user->gender = 1;
            $user->mobile_number = '15755054365';
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');
            $user->operated_at = date('Y-m-d H:i:s');
            $user->last_login_at = date('Y-m-d H:i:s');
            $user->status = 1;
            $user->deleted = 0;
            
            if (! $user->save()){
                throw new Exception('记录未保存成功');
            }
    
            $transaction->commit();
    
            $this->asJson([
                'success' => true,
                'msg' => $user->id,
            ]);
        } catch(\Exception $e) {
            $transaction->rollBack();
            $this->asJson([
                'success' => false,
                'msg' => $e->getMessage(),
            ]);
        } catch(\Throwable $e) {
            $transaction->rollBack();
            $this->asJson([
                'success' => false,
                'msg' => $e->getMessage(),
            ]);
        }
    }
    
    public function actionEdit() {
    
    }
    
    public function actionDelete() {
    
    }
    
    public function actionEnable() {
    
    }
    
    public function actionDisable() {
    
    }
}
