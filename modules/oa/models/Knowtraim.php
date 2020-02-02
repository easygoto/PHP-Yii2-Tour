<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_knowtraim}}".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $optid
 * @property string $optname 操作人
 * @property string $optdt
 * @property int $dxshu 多选题目数量
 * @property int $dsshu 单选题目数量
 * @property int $reshu 培训人数
 * @property string $startdt 开始时间
 * @property string $enddt 截止时间
 * @property int $kstime 考试时间(分钟)
 * @property int $ydshu 已答题人数
 * @property int $status 状态
 * @property string $receid
 * @property string $recename 发给谁培训
 * @property string $explain 说明
 * @property int $state 0还没开始,1考试中,2已结束
 * @property int $zfenshu 总分
 * @property int $hgfen 合格分数
 * @property string $tikuid
 * @property string $tikuname 对应题库
 */
class Knowtraim extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'dxshu' => ['type' => 'int', 'filter' => 'like'],
        'dsshu' => ['type' => 'int', 'filter' => 'like'],
        'reshu' => ['type' => 'int', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'kstime' => ['type' => 'int', 'filter' => 'like'],
        'ydshu' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'zfenshu' => ['type' => 'int', 'filter' => 'like'],
        'hgfen' => ['type' => 'int', 'filter' => 'like'],
        'tikuid' => ['type' => 'string', 'filter' => 'like'],
        'tikuname' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_knowtraim}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optid', 'dxshu', 'dsshu', 'reshu', 'kstime', 'ydshu', 'status', 'state', 'zfenshu', 'hgfen'], 'integer'],
            [['optdt', 'startdt', 'enddt'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['optname'], 'string', 'max' => 20],
            [['receid', 'recename', 'tikuid', 'tikuname'], 'string', 'max' => 200],
            [['explain'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'optid' => 'Optid',
            'optname' => '操作人',
            'optdt' => 'Optdt',
            'dxshu' => '多选题目数量',
            'dsshu' => '单选题目数量',
            'reshu' => '培训人数',
            'startdt' => '开始时间',
            'enddt' => '截止时间',
            'kstime' => '考试时间(分钟)',
            'ydshu' => '已答题人数',
            'status' => '状态',
            'receid' => 'Receid',
            'recename' => '发给谁培训',
            'explain' => '说明',
            'state' => '0还没开始,1考试中,2已结束',
            'zfenshu' => '总分',
            'hgfen' => '合格分数',
            'tikuid' => 'Tikuid',
            'tikuname' => '对应题库',
        ];
    }
}
