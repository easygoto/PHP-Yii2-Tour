<?php

namespace app\modules\dawn\behaviors\services;

use app\behaviors\services\BaseService;
use app\behaviors\utils\BaseUtil;
use app\modules\dawn\behaviors\utils\UserUtil;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\User;
use Trink\Core\Helper\Result;
use app\web\Yii;
use yii\db\Exception;
use yii\db\Query;

class UserService extends BaseService
{
    private static function complete(Query $query, $keywords = [])
    {
        if (empty($keywords)) {
            return $query;
        }
        foreach ($keywords as $key => $value) {
            if ($key == 'status' && array_key_exists($value, UserUtil::STATUS)) {
                $query->where(['status' => UserUtil::STATUS[$value]]);
            } elseif ($key == 'status') {
                $query->where(['status' => UserUtil::STATUS[$value]]);
            }
        }
        return $query;
    }

    public static function lists($keywords, $page)
    {
        $query = new Query();
        $query->select('*');
        $query->from('`user`');
        self::complete($query, $keywords);
        $query->limit(Constant::DEFAULT_PAGE_SIZE);
        $query->offset(($page - 1) * Constant::DEFAULT_PAGE_SIZE);
        $total = $query->count('1');
        $list  = $query->all();
        return Result::lists($list, $total, Constant::DEFAULT_PAGE_SIZE);
    }

    public static function add($data = [])
    {
        $db          = Yii::$app->db;
        $transaction = $db->beginTransaction();

        $user = new User;
        try {
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
            $user->deleted       = Constant::DEFAULT_NOT_DELETE;

            if (!$user->save()) {
                throw new Exception('记录未保存成功');
            }

            $transaction->commit();
            return Result::success([
                'id' => $user->id
            ], Message::ADD_SUCCESS);
        } catch (Exception $e) {
            $transaction->rollBack();
            return Result::fail($e->getMessage(), $user->getErrors());
        }
    }

    public static function edit($id, $data = [])
    {
    }
}
