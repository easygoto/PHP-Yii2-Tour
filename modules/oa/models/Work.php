<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_work}}".
 *
 * @property int $id
 * @property string $num
 * @property string $title 标题
 * @property string $type 任务类型
 * @property string $grade 任务等级
 * @property string $distid
 * @property string $dist 分配给
 * @property string $explain 说明
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $startdt 开始时间
 * @property string $enddt 结束时间
 * @property int $state 状态
 * @property string $txdt
 * @property int $fen 分值
 * @property int $status
 * @property int $projectid 对应项目Id
 * @property string $ddid
 * @property string $ddname 督导人员，不填默认上级
 * @property int $score 任务分数
 * @property int $mark 得分
 * @property int $uid
 * @property string $applydt 申请日期
 * @property int $isturn 是否提交
 */
class Work extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'grade' => ['type' => 'string', 'filter' => 'like'],
        'distid' => ['type' => 'string', 'filter' => 'like'],
        'dist' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'txdt' => ['type' => 'string', 'filter' => 'like'],
        'fen' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'projectid' => ['type' => 'int', 'filter' => 'like'],
        'ddid' => ['type' => 'string', 'filter' => 'like'],
        'ddname' => ['type' => 'string', 'filter' => 'like'],
        'score' => ['type' => 'int', 'filter' => 'like'],
        'mark' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_work}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optdt', 'startdt', 'enddt', 'txdt', 'applydt'], 'safe'],
            [['optid', 'state', 'fen', 'status', 'projectid', 'score', 'mark', 'uid', 'isturn'], 'integer'],
            [['num'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 200],
            [['type', 'optname'], 'string', 'max' => 20],
            [['grade'], 'string', 'max' => 10],
            [['distid', 'dist', 'ddid', 'ddname'], 'string', 'max' => 50],
            [['explain'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Num',
            'title' => '标题',
            'type' => '任务类型',
            'grade' => '任务等级',
            'distid' => 'Distid',
            'dist' => '分配给',
            'explain' => '说明',
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'startdt' => '开始时间',
            'enddt' => '结束时间',
            'state' => '状态',
            'txdt' => 'Txdt',
            'fen' => '分值',
            'status' => 'Status',
            'projectid' => '对应项目Id',
            'ddid' => 'Ddid',
            'ddname' => '督导人员，不填默认上级',
            'score' => '任务分数',
            'mark' => '得分',
            'uid' => 'Uid',
            'applydt' => '申请日期',
            'isturn' => '是否提交',
        ];
    }
}
