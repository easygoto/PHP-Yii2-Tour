<?php

namespace app\service\api;

use Yii;
use yii\db\Exception;
use app\models\api\User;
use app\utils\api\UserUtil;
use app\service\BaseService;

class UserService extends BaseService {
    
    public static function lists() {
    
    }
    
    public static function add($data=[]) {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $postFix = md5(microtime(true));
        
            $user = new User;
            $user->user_name = 'admin'.$postFix;
            $user->real_name = 'admin'.$postFix;
            $user->gender = UserUtil::GENDER['MALE'];
            $user->mobile_number = '15755054365';
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');
            $user->operated_at = date('Y-m-d H:i:s');
            $user->last_login_at = date('Y-m-d H:i:s');
            $user->status = UserUtil::STATUS['NORMAL'];
            $user->deleted = DEFAULT_DELETED;
        
            if (! $user->save()){
                throw new Exception('记录未保存成功');
            }
        
            $transaction->commit();
            return self::success([$user->id, $data]);
        } catch(Exception $e) {
            $transaction->rollBack();
            return self::fail($e->getMessage());
        }
    }
    
    public static function edit() {
    
    }
    
    public static function delete() {
    
    }
}
