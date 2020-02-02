<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_logintoken}}".
 *
 * @property int $id
 * @property int $uid 用户ID
 * @property string $name
 * @property string $token
 * @property string $adddt
 * @property string $moddt
 * @property string $cfrom
 * @property string $device
 * @property string $ip
 * @property string $web
 * @property int $online
 */
class Logintoken extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'token' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'moddt' => ['type' => 'string', 'filter' => 'like'],
        'cfrom' => ['type' => 'string', 'filter' => 'like'],
        'device' => ['type' => 'string', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
        'web' => ['type' => 'string', 'filter' => 'like'],
        'online' => ['type' => 'int', 'filter' => 'like'],
    ];

    const RESULT_FILTER = [
        'all' => [
            'include' => null,
            'exclude' => []
        ],
        'list' => [
            'include' => null,
            'exclude' => []
        ],
        'detail' => [
            'include' => null,
            'exclude' => []
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%oa_logintoken}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'online'], 'integer'],
            [['adddt', 'moddt'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['token', 'device'], 'string', 'max' => 50],
            [['cfrom'], 'string', 'max' => 10],
            [['ip', 'web'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '用户ID',
            'name' => 'Name',
            'token' => 'Token',
            'adddt' => 'Adddt',
            'moddt' => 'Moddt',
            'cfrom' => 'Cfrom',
            'device' => 'Device',
            'ip' => 'Ip',
            'web' => 'Web',
            'online' => 'Online',
        ];
    }
}
