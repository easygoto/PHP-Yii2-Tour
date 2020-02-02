<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_log}}".
 *
 * @property int $id
 * @property string $table
 * @property int $mid
 * @property int $status 1通过
 * @property string $statusname 状态名称
 * @property string $name 进程名称
 * @property int $courseid
 * @property string $optdt 操作时间
 * @property string $explain 说明
 * @property string $ip
 * @property string $web 浏览器
 * @property string $checkname
 * @property int $checkid
 * @property int $modeid @模块Id
 * @property string $color
 * @property int $valid
 * @property int $step 步骤号
 * @property string $qmimg 签名的图片base64
 * @property int $iszb 是否转办记录
 */
class Flowlog extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'statusname' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'courseid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
        'web' => ['type' => 'string', 'filter' => 'like'],
        'checkname' => ['type' => 'string', 'filter' => 'like'],
        'checkid' => ['type' => 'int', 'filter' => 'like'],
        'modeid' => ['type' => 'int', 'filter' => 'like'],
        'color' => ['type' => 'string', 'filter' => 'like'],
        'valid' => ['type' => 'int', 'filter' => 'like'],
        'step' => ['type' => 'int', 'filter' => 'like'],
        'qmimg' => ['type' => 'string', 'filter' => 'like'],
        'iszb' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'status', 'courseid', 'checkid', 'modeid', 'valid', 'step', 'iszb'], 'integer'],
            [['optdt'], 'safe'],
            [['qmimg'], 'string'],
            [['table', 'name', 'web'], 'string', 'max' => 50],
            [['statusname', 'checkname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['ip'], 'string', 'max' => 30],
            [['color'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'mid' => 'Mid',
            'status' => '1通过',
            'statusname' => '状态名称',
            'name' => '进程名称',
            'courseid' => 'Courseid',
            'optdt' => '操作时间',
            'explain' => '说明',
            'ip' => 'Ip',
            'web' => '浏览器',
            'checkname' => 'Checkname',
            'checkid' => 'Checkid',
            'modeid' => '@模块Id',
            'color' => 'Color',
            'valid' => 'Valid',
            'step' => '步骤号',
            'qmimg' => '签名的图片base64',
            'iszb' => '是否转办记录',
        ];
    }
}
