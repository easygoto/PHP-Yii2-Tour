<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $user_name
 * @property string $secret_code
 * @property string $real_name
 * @property string $mobile_number
 * @property integer $gender
 * @property string $created_at
 * @property string $updated_at
 * @property string $operated_at
 * @property string $last_login_at
 * @property integer $status
 * @property integer $deleted
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'status', 'deleted'], 'integer'],
            [['created_at', 'updated_at', 'operated_at', 'last_login_at'], 'safe'],
            [['user_name', 'secret_code', 'real_name', 'mobile_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => '用户名',
            'secret_code' => '密码',
            'real_name' => '真实姓名',
            'mobile_number' => '手机号码',
            'gender' => '性别',
            'created_at' => '创建时间',
            'updated_at' => '更新信息时间',
            'operated_at' => '操作时间',
            'last_login_at' => '最后一次登录时间',
            'status' => '状态',
            'deleted' => '是否删除',
        ];
    }
}
