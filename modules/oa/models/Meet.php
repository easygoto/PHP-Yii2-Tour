<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_meet}}".
 *
 * @property int $id
 * @property string $hyname 会议室名称
 * @property string $title 主题
 * @property string $startdt 开始时间
 * @property string $enddt 结束时间
 * @property int $state 会议状态@0|正常,1|会议中,2|结束,3|取消
 * @property int $status
 * @property int $type 类型@0|普通,1|固定,2|纪要
 * @property string $joinid
 * @property string $joinname 参加人员
 * @property int $mid
 * @property string $optname 发起人
 * @property string $rate
 * @property int $uid
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $explain 说明
 * @property string $cancelreason
 * @property string $jyid 会议纪要人id
 * @property string $jyname 会议纪要人
 * @property string $content 会议纪要内容
 * @property int $issms 是否短信通知
 */
class Meet extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'hyname' => ['type' => 'string', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'joinid' => ['type' => 'string', 'filter' => 'like'],
        'joinname' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'rate' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'cancelreason' => ['type' => 'string', 'filter' => 'like'],
        'jyid' => ['type' => 'string', 'filter' => 'like'],
        'jyname' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'issms' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_meet}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state', 'status', 'type', 'mid', 'uid', 'optid', 'issms'], 'integer'],
            [['optdt'], 'safe'],
            [['hyname', 'optname'], 'string', 'max' => 20],
            [['title', 'startdt', 'enddt'], 'string', 'max' => 50],
            [['joinid', 'cancelreason'], 'string', 'max' => 200],
            [['joinname', 'explain'], 'string', 'max' => 500],
            [['rate', 'jyid', 'jyname'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hyname' => '会议室名称',
            'title' => '主题',
            'startdt' => '开始时间',
            'enddt' => '结束时间',
            'state' => '会议状态@0|正常,1|会议中,2|结束,3|取消',
            'status' => 'Status',
            'type' => '类型@0|普通,1|固定,2|纪要',
            'joinid' => 'Joinid',
            'joinname' => '参加人员',
            'mid' => 'Mid',
            'optname' => '发起人',
            'rate' => 'Rate',
            'uid' => 'Uid',
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'explain' => '说明',
            'cancelreason' => 'Cancelreason',
            'jyid' => '会议纪要人id',
            'jyname' => '会议纪要人',
            'content' => '会议纪要内容',
            'issms' => '是否短信通知',
        ];
    }
}
