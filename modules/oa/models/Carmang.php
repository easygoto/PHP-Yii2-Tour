<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_carmang}}".
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
 * @property int $carid 维修车辆
 * @property string $reason 维修原因
 * @property string $address 维修地点
 * @property string $jianame 驾驶员
 * @property string $jiaid
 * @property string $bujian 更换部件
 * @property string $startdt 维修时间
 * @property string $enddt 维修截止时间
 * @property string $money 维修金额
 * @property int $type 类型@0|车辆维修,1|保养
 * @property string $nextdt 下次保养日期
 * @property string $kmshu 当前保养公里数
 * @property string $kmnshu 下次保养公里数
 */
class Carmang extends \yii\db\ActiveRecord
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
        'carid' => ['type' => 'int', 'filter' => 'like'],
        'reason' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'jianame' => ['type' => 'string', 'filter' => 'like'],
        'jiaid' => ['type' => 'string', 'filter' => 'like'],
        'bujian' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'nextdt' => ['type' => 'string', 'filter' => 'like'],
        'kmshu' => ['type' => 'string', 'filter' => 'like'],
        'kmnshu' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_carmang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'carid', 'type'], 'integer'],
            [['optdt', 'applydt', 'startdt', 'enddt', 'nextdt'], 'safe'],
            [['money'], 'number'],
            [['optname', 'kmshu', 'kmnshu'], 'string', 'max' => 20],
            [['explain', 'reason'], 'string', 'max' => 500],
            [['address', 'jianame', 'jiaid'], 'string', 'max' => 50],
            [['bujian'], 'string', 'max' => 200],
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
            'carid' => '维修车辆',
            'reason' => '维修原因',
            'address' => '维修地点',
            'jianame' => '驾驶员',
            'jiaid' => 'Jiaid',
            'bujian' => '更换部件',
            'startdt' => '维修时间',
            'enddt' => '维修截止时间',
            'money' => '维修金额',
            'type' => '类型@0|车辆维修,1|保养',
            'nextdt' => '下次保养日期',
            'kmshu' => '当前保养公里数',
            'kmnshu' => '下次保养公里数',
        ];
    }
}
