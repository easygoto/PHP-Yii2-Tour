<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_carms}}".
 *
 * @property int $id
 * @property int $carid 车辆Id
 * @property string $otype 类型,加油
 * @property string $startdt
 * @property string $enddt 截止时间
 * @property string $money 花费金额
 * @property int $optid 添加人id
 * @property string $optdt
 * @property string $optname 添加人
 * @property int $status 状态
 * @property string $explain 说明
 * @property string $unitname 对应名称
 * @property string $applydt 申请日期
 * @property string $address 地点
 * @property string $jiaid
 * @property string $jianame 驾驶员
 */
class Carms extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'carid' => ['type' => 'int', 'filter' => 'like'],
        'otype' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'unitname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'jiaid' => ['type' => 'string', 'filter' => 'like'],
        'jianame' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_carms}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carid', 'optid', 'status'], 'integer'],
            [['startdt', 'enddt', 'optdt', 'applydt'], 'safe'],
            [['money'], 'number'],
            [['otype', 'optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['unitname'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 100],
            [['jiaid', 'jianame'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carid' => '车辆Id',
            'otype' => '类型,加油',
            'startdt' => 'Startdt',
            'enddt' => '截止时间',
            'money' => '花费金额',
            'optid' => '添加人id',
            'optdt' => 'Optdt',
            'optname' => '添加人',
            'status' => '状态',
            'explain' => '说明',
            'unitname' => '对应名称',
            'applydt' => '申请日期',
            'address' => '地点',
            'jiaid' => 'Jiaid',
            'jianame' => '驾驶员',
        ];
    }
}
