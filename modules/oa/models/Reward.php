<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_reward}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $isturn 是否提交
 * @property string $object 奖惩对象
 * @property int $objectid
 * @property int $type 奖惩类型0奖励,1处罚
 * @property string $result 奖惩结果
 * @property int $money 奖惩金额
 * @property string $happendt 发生时间
 * @property string $hapaddress 发生地点
 */
class Reward extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'object' => ['type' => 'string', 'filter' => 'like'],
        'objectid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'result' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'int', 'filter' => 'like'],
        'happendt' => ['type' => 'string', 'filter' => 'like'],
        'hapaddress' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_reward}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'objectid', 'type', 'money'], 'integer'],
            [['optdt', 'applydt', 'happendt'], 'safe'],
            [['optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['object'], 'string', 'max' => 30],
            [['result', 'hapaddress'], 'string', 'max' => 50],
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
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => '状态',
            'isturn' => '是否提交',
            'object' => '奖惩对象',
            'objectid' => 'Objectid',
            'type' => '奖惩类型0奖励,1处罚',
            'result' => '奖惩结果',
            'money' => '奖惩金额',
            'happendt' => '发生时间',
            'hapaddress' => '发生地点',
        ];
    }
}
