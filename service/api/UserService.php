<?php

namespace app\service\api;

use Yii;
use yii\db\Exception;
use app\models\api\User;
use app\utils\RetUtil;
use app\utils\BaseUtil;
use app\utils\api\UserUtil;
use app\service\BaseService;
use yii\db\Query;

class UserService extends BaseService {
    
    private static function _complete(Query $query, $keywords = []) {
        if (empty($keywords)) {
            return $query;
        }
        foreach ($keywords as $key => $value) {
            if ($key == 'status' && array_key_exists($value, UserUtil::STATUS)) {
                $query->where(['status' => UserUtil::STATUS[$value]]);
            } else if ($key == 'status') {
                $query->where(['status' => UserUtil::STATUS[$value]]);
            }
        }
        return $query;
    }
    
    public static function lists($keywords, $page, $page_size) {
        $query = new Query();
        $query->select('*');
        $query->from('`user`');
        self::_complete($query, $keywords);
        $query->limit($page_size);
        $query->offset(($page - 1) * $page_size);
        $total = $query->count();
        $list  = $query->all();
        return RetUtil::retList($list, $total, $page_size);
    }
    
    public static function add($data = []) {
        
        $user                = new User;
        $user->user_name     = BaseUtil::getTrimValue($data, 'user_name');
        $user->real_name     = BaseUtil::getTrimValue($data, 'real_name');
        $gender              = BaseUtil::getTrimValue($data, 'gender');
        $user->gender        = array_key_exists($gender, UserUtil::GENDER) ? $gender : 2; // 默认未知
        $user->mobile_number = BaseUtil::getTrimValue($data, 'mobile_number');
        $user->created_at    = date('Y-m-d H:i:s');
        $user->updated_at    = '';
        $user->operated_at   = '';
        $user->last_login_at = '';
        $user->status        = 1; // 正常
        $user->deleted       = DEFAULT_UNDELETED;
        
        $db          = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            if (! $user->save()) {
                throw new Exception('记录未保存成功');
            }
            
            $transaction->commit();
            return RetUtil::success($user->id, $data);
        } catch (Exception $e) {
            try {
                $transaction->rollBack();
            } catch (Exception $e) {
                return RetUtil::fail($e->getMessage(), $e->errorInfo);
            }
            return RetUtil::fail($e->getMessage(), $user->getErrors());
        }
    }
    
    public static function edit($id, $data = []) {
    
    }
}
