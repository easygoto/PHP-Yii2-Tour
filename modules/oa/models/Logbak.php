<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_log_bak}}".
 *
 * @property int $id
 * @property string $type 类型
 * @property int $optid 操作人id
 * @property string $optname 操作人
 * @property string $remark 备注
 * @property string $optdt 添加时间
 * @property string $ip IP地址
 * @property string $web 浏览器
 * @property string $device
 * @property int $level 日志级别0普通,1提示,2错误
 * @property string $url
 */
class Logbak extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'remark' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
        'web' => ['type' => 'string', 'filter' => 'like'],
        'device' => ['type' => 'string', 'filter' => 'like'],
        'level' => ['type' => 'int', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_log_bak}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optid', 'level'], 'integer'],
            [['optdt'], 'safe'],
            [['type', 'device'], 'string', 'max' => 50],
            [['optname'], 'string', 'max' => 20],
            [['remark', 'url'], 'string', 'max' => 500],
            [['ip'], 'string', 'max' => 30],
            [['web'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型',
            'optid' => '操作人id',
            'optname' => '操作人',
            'remark' => '备注',
            'optdt' => '添加时间',
            'ip' => 'IP地址',
            'web' => '浏览器',
            'device' => 'Device',
            'level' => '日志级别0普通,1提示,2错误',
            'url' => 'Url',
        ];
    }
}
