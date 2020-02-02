<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqjcmd}}".
 *
 * @property int $id
 * @property int $snid 设备ID
 * @property string $cmd 发送命令内容
 * @property int $status 运行状态0待运行,1已运行,2请求中
 * @property string $qjtime 请求时间
 * @property string $optdt 操作时间
 * @property string $cjtime 处理时间
 * @property string $atype 类型
 * @property string $others 推送主键id
 */
class Kqjcmd extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'snid' => ['type' => 'int', 'filter' => 'like'],
        'cmd' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'qjtime' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'cjtime' => ['type' => 'string', 'filter' => 'like'],
        'atype' => ['type' => 'string', 'filter' => 'like'],
        'others' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqjcmd}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'snid', 'status'], 'integer'],
            [['cmd'], 'string'],
            [['qjtime', 'optdt', 'cjtime'], 'safe'],
            [['atype'], 'string', 'max' => 30],
            [['others'], 'string', 'max' => 500],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'snid' => '设备ID',
            'cmd' => '发送命令内容',
            'status' => '运行状态0待运行,1已运行,2请求中',
            'qjtime' => '请求时间',
            'optdt' => '操作时间',
            'cjtime' => '处理时间',
            'atype' => '类型',
            'others' => '推送主键id',
        ];
    }
}
