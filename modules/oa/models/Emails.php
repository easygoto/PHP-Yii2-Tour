<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_emails}}".
 *
 * @property int $id
 * @property int $mid
 * @property int $uid
 * @property int $zt @0|未读,1|已读
 * @property int $type 0接收,1抄送,2发送者
 * @property int $ishui 是否回复
 * @property int $isdel @0|未删,1|已删
 * @property string $optdt 操作时间
 * @property string $email
 * @property string $personal 人员
 */
class Emails extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'zt' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'ishui' => ['type' => 'int', 'filter' => 'like'],
        'isdel' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'email' => ['type' => 'string', 'filter' => 'like'],
        'personal' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_emails}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'uid', 'zt', 'type', 'ishui', 'isdel'], 'integer'],
            [['optdt'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['personal'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => 'Mid',
            'uid' => 'Uid',
            'zt' => '@0|未读,1|已读',
            'type' => '0接收,1抄送,2发送者',
            'ishui' => '是否回复',
            'isdel' => '@0|未删,1|已删',
            'optdt' => '操作时间',
            'email' => 'Email',
            'personal' => '人员',
        ];
    }
}
