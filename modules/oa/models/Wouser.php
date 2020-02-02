<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_wouser}}".
 *
 * @property int $id
 * @property int $uid 绑定用户Id
 * @property string $openid
 * @property string $nickname 微信昵称
 * @property int $sex 性别1男2女0未知
 * @property string $province 省份
 * @property string $city 城市
 * @property string $country 国家
 * @property string $headimgurl 微信头像
 * @property string $adddt 添加时间
 * @property string $optdt 操作时间
 * @property string $ip IP
 */
class Wouser extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'openid' => ['type' => 'string', 'filter' => 'like'],
        'nickname' => ['type' => 'string', 'filter' => 'like'],
        'sex' => ['type' => 'int', 'filter' => 'like'],
        'province' => ['type' => 'string', 'filter' => 'like'],
        'city' => ['type' => 'string', 'filter' => 'like'],
        'country' => ['type' => 'string', 'filter' => 'like'],
        'headimgurl' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_wouser}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'sex'], 'integer'],
            [['adddt', 'optdt'], 'safe'],
            [['openid'], 'string', 'max' => 100],
            [['nickname', 'province', 'city', 'country'], 'string', 'max' => 30],
            [['headimgurl'], 'string', 'max' => 300],
            [['ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '绑定用户Id',
            'openid' => 'Openid',
            'nickname' => '微信昵称',
            'sex' => '性别1男2女0未知',
            'province' => '省份',
            'city' => '城市',
            'country' => '国家',
            'headimgurl' => '微信头像',
            'adddt' => '添加时间',
            'optdt' => '操作时间',
            'ip' => 'IP',
        ];
    }
}
