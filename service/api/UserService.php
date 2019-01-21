<?php

namespace app\service\api;

use Yii;
use yii\db\Exception;
use app\models\api\User;
use app\utils\RetUtil;
use app\utils\api\UserUtil;
use app\service\BaseService;
use yii\db\Query;

class UserService extends BaseService {
    
    public static function lists($keywords, $page, $pageSize) {
        $query = new Query();
        $query->select('*');
        $query->from('`user`');
        if (! empty($keywords)) {
            foreach ($keywords as $key => $value) {
                if ($key == 'status' && array_key_exists($value, UserUtil::STATUS)) {
                    $query->where(['status' => UserUtil::STATUS[$value]]);
                }
            }
        }
        $query->limit($pageSize);
        $query->offset(($page - 1) * $pageSize);
        $total = $query->count();
        $list  = $query->all();
        return RetUtil::retList($list, $total, $pageSize);
    }
    
    public static function add($data = []) {
        $db          = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $postFix = md5(microtime(true));
            
            $user                = new User;
            $user->user_name     = 'admin' . $postFix;
            $user->real_name     = 'admin' . $postFix;
            $user->gender        = UserUtil::GENDER['MALE'];
            $user->mobile_number = '15755054365';
            $user->created_at    = date('Y-m-d H:i:s');
            $user->updated_at    = date('Y-m-d H:i:s');
            $user->operated_at   = date('Y-m-d H:i:s');
            $user->last_login_at = date('Y-m-d H:i:s');
            $user->status        = UserUtil::STATUS['NORMAL'];
            $user->deleted       = DEFAULT_DELETED;
            
            if (! $user->save()) {
                throw new Exception('记录未保存成功');
            }
            
            $transaction->commit();
            return RetUtil::success([$user->id, $data]);
        } catch (Exception $e) {
            try {
                $transaction->rollBack();
            } catch (Exception $e) {
                return RetUtil::fail($e->getMessage());
            }
            return RetUtil::fail($e->getMessage());
        }
    }
    
    public static function edit() {
    
    }
    
    public static function delete($id) {
    
    }
}
