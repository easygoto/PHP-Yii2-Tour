<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $user_name 用户名
 * @property string $secret_code 密码
 * @property string $real_name 真实姓名
 * @property string $mobile_number 手机号码
 * @property int $gender 性别
 * @property string $created_at 创建时间
 * @property string $updated_at 更新信息时间
 * @property string $operated_at 操作时间
 * @property string $last_login_at 最后一次登录时间
 * @property int $status 状态
 * @property int $is_delete 是否删除
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'status', 'is_delete'], 'integer'],
            [['created_at', 'updated_at', 'operated_at', 'last_login_at'], 'safe'],
            [['user_name', 'secret_code', 'real_name', 'mobile_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'secret_code' => 'Secret Code',
            'real_name' => 'Real Name',
            'mobile_number' => 'Mobile Number',
            'gender' => 'Gender',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'operated_at' => 'Operated At',
            'last_login_at' => 'Last Login At',
            'status' => 'Status',
            'is_delete' => 'Is Delete',
        ];
    }
}
