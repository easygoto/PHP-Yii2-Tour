<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrcheck}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $title 考核名称
 * @property string $applyname 申请人姓名
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $isturn 是否提交
 * @property string $uname 对应人
 * @property string $month 月份
 * @property string $content 考核内容
 * @property string $fenzp 自评分数
 * @property string $fensj 上级评分
 * @property string $fenrs 人事评分
 * @property string $fen 最后得分
 * @property int $khid 关联考核项目hrkaohem.id
 * @property string $createdt 创建时间
 * @property string $startdt 评分开始时间
 * @property string $enddt 评分截止时间
 * @property string $pfren 评分人
 * @property string $pfrenid
 * @property string $pfrenids 未评分人Id
 * @property string $pfrens 未评分人
 */
class Hrcheck extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'applyname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'uname' => ['type' => 'string', 'filter' => 'like'],
        'month' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'fenzp' => ['type' => 'string', 'filter' => 'like'],
        'fensj' => ['type' => 'string', 'filter' => 'like'],
        'fenrs' => ['type' => 'string', 'filter' => 'like'],
        'fen' => ['type' => 'string', 'filter' => 'like'],
        'khid' => ['type' => 'int', 'filter' => 'like'],
        'createdt' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'pfren' => ['type' => 'string', 'filter' => 'like'],
        'pfrenid' => ['type' => 'string', 'filter' => 'like'],
        'pfrenids' => ['type' => 'string', 'filter' => 'like'],
        'pfrens' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrcheck}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'khid'], 'integer'],
            [['optdt', 'applydt', 'createdt', 'startdt', 'enddt'], 'safe'],
            [['fenzp', 'fensj', 'fenrs', 'fen'], 'number'],
            [['title'], 'string', 'max' => 100],
            [['applyname'], 'string', 'max' => 30],
            [['optname', 'uname'], 'string', 'max' => 20],
            [['explain', 'pfren', 'pfrenid', 'pfrenids', 'pfrens'], 'string', 'max' => 500],
            [['month'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 2000],
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
            'title' => '考核名称',
            'applyname' => '申请人姓名',
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => '状态',
            'isturn' => '是否提交',
            'uname' => '对应人',
            'month' => '月份',
            'content' => '考核内容',
            'fenzp' => '自评分数',
            'fensj' => '上级评分',
            'fenrs' => '人事评分',
            'fen' => '最后得分',
            'khid' => '关联考核项目hrkaohem.id',
            'createdt' => '创建时间',
            'startdt' => '评分开始时间',
            'enddt' => '评分截止时间',
            'pfren' => '评分人',
            'pfrenid' => 'Pfrenid',
            'pfrenids' => '未评分人Id',
            'pfrens' => '未评分人',
        ];
    }
}
