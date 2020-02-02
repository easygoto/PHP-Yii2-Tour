<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_repair}}".
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
 * @property string $assetm 报修资产
 * @property string $reason 保修原因
 * @property string $reasons 实际原因
 * @property int $iswx 需要外修
 * @property string $money 维修金额
 * @property string $wxname 维修人员
 */
class Repair extends \yii\db\ActiveRecord
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
        'assetm' => ['type' => 'string', 'filter' => 'like'],
        'reason' => ['type' => 'string', 'filter' => 'like'],
        'reasons' => ['type' => 'string', 'filter' => 'like'],
        'iswx' => ['type' => 'int', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'wxname' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_repair}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'iswx'], 'integer'],
            [['optdt', 'applydt'], 'safe'],
            [['money'], 'number'],
            [['optname'], 'string', 'max' => 20],
            [['explain', 'reason', 'reasons'], 'string', 'max' => 500],
            [['assetm'], 'string', 'max' => 100],
            [['wxname'], 'string', 'max' => 50],
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
            'assetm' => '报修资产',
            'reason' => '保修原因',
            'reasons' => '实际原因',
            'iswx' => '需要外修',
            'money' => '维修金额',
            'wxname' => '维修人员',
        ];
    }
}
