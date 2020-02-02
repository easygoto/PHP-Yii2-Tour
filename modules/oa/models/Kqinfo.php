<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqinfo}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $uname
 * @property string $stime
 * @property string $etime
 * @property string $kind 类型
 * @property string $qjkind 请假类型
 * @property string $explain
 * @property int $status 状态
 * @property string $totals 时间
 * @property string $optdt
 * @property int $isturn 是否提交
 * @property string $optname
 * @property int $optid
 * @property string $applydt 申请日期
 * @property string $jiafee 加班费
 * @property int $jiatype 加班方式0换调休,1给加班费
 * @property string $totday 请假天数
 * @property string $enddt 截止使用时间
 */
class Kqinfo extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'uname' => ['type' => 'string', 'filter' => 'like'],
        'stime' => ['type' => 'string', 'filter' => 'like'],
        'etime' => ['type' => 'string', 'filter' => 'like'],
        'kind' => ['type' => 'string', 'filter' => 'like'],
        'qjkind' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'totals' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'jiafee' => ['type' => 'string', 'filter' => 'like'],
        'jiatype' => ['type' => 'int', 'filter' => 'like'],
        'totday' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqinfo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'status', 'isturn', 'optid', 'jiatype'], 'integer'],
            [['stime', 'etime', 'optdt', 'applydt', 'enddt'], 'safe'],
            [['totals', 'jiafee', 'totday'], 'number'],
            [['uname', 'qjkind', 'optname'], 'string', 'max' => 20],
            [['kind'], 'string', 'max' => 10],
            [['explain'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'uname' => 'Uname',
            'stime' => 'Stime',
            'etime' => 'Etime',
            'kind' => '类型',
            'qjkind' => '请假类型',
            'explain' => 'Explain',
            'status' => '状态',
            'totals' => '时间',
            'optdt' => 'Optdt',
            'isturn' => '是否提交',
            'optname' => 'Optname',
            'optid' => 'Optid',
            'applydt' => '申请日期',
            'jiafee' => '加班费',
            'jiatype' => '加班方式0换调休,1给加班费',
            'totday' => '请假天数',
            'enddt' => '截止使用时间',
        ];
    }
}
