<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_carmrese}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status
 * @property int $isturn
 * @property string $useid
 * @property string $usename 使用者
 * @property int $useren 使用人数
 * @property string $startdt 开始时间
 * @property string $enddt 截止时间
 * @property string $address 目的地
 * @property int $carid
 * @property string $carnum 使用车辆
 * @property string $xianlines 线路
 * @property string $jiaid
 * @property string $jianame 驾驶员
 * @property string $kmstart 起始公里数
 * @property string $kmend 结束公里数
 * @property string $returndt 归还时间
 */
class Carmrese extends \yii\db\ActiveRecord
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
        'useid' => ['type' => 'string', 'filter' => 'like'],
        'usename' => ['type' => 'string', 'filter' => 'like'],
        'useren' => ['type' => 'int', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'carid' => ['type' => 'int', 'filter' => 'like'],
        'carnum' => ['type' => 'string', 'filter' => 'like'],
        'xianlines' => ['type' => 'string', 'filter' => 'like'],
        'jiaid' => ['type' => 'string', 'filter' => 'like'],
        'jianame' => ['type' => 'string', 'filter' => 'like'],
        'kmstart' => ['type' => 'string', 'filter' => 'like'],
        'kmend' => ['type' => 'string', 'filter' => 'like'],
        'returndt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_carmrese}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'useren', 'carid'], 'integer'],
            [['optdt', 'applydt', 'startdt', 'enddt', 'returndt'], 'safe'],
            [['optname', 'kmstart', 'kmend'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['useid', 'usename', 'xianlines', 'jiaid', 'jianame'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 50],
            [['carnum'], 'string', 'max' => 10],
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
            'status' => 'Status',
            'isturn' => 'Isturn',
            'useid' => 'Useid',
            'usename' => '使用者',
            'useren' => '使用人数',
            'startdt' => '开始时间',
            'enddt' => '截止时间',
            'address' => '目的地',
            'carid' => 'Carid',
            'carnum' => '使用车辆',
            'xianlines' => '线路',
            'jiaid' => 'Jiaid',
            'jianame' => '驾驶员',
            'kmstart' => '起始公里数',
            'kmend' => '结束公里数',
            'returndt' => '归还时间',
        ];
    }
}
