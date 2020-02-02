<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_carm}}".
 *
 * @property int $id
 * @property string $carnum 车牌号
 * @property string $carbrand 车辆品牌
 * @property string $carmode 型号
 * @property string $cartype 车辆类型
 * @property string $buydt 购买日期
 * @property int $buyprice 购买价格
 * @property string $enginenb 发动机号
 * @property int $ispublic 是否公开使用
 * @property string $optdt
 * @property int $optid
 * @property string $optname
 * @property string $adddt
 * @property string $createname
 * @property string $explain 说明
 * @property int $state 状态@0|办理中,1|可用,2|维修中,3|报废
 * @property string $framenum 车架号
 * @property int $status
 */
class Carm extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'carnum' => ['type' => 'string', 'filter' => 'like'],
        'carbrand' => ['type' => 'string', 'filter' => 'like'],
        'carmode' => ['type' => 'string', 'filter' => 'like'],
        'cartype' => ['type' => 'string', 'filter' => 'like'],
        'buydt' => ['type' => 'string', 'filter' => 'like'],
        'buyprice' => ['type' => 'int', 'filter' => 'like'],
        'enginenb' => ['type' => 'string', 'filter' => 'like'],
        'ispublic' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'createname' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'framenum' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_carm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buydt', 'optdt', 'adddt'], 'safe'],
            [['buyprice', 'ispublic', 'optid', 'state', 'status'], 'integer'],
            [['carnum', 'cartype'], 'string', 'max' => 10],
            [['carbrand', 'optname', 'createname'], 'string', 'max' => 20],
            [['carmode'], 'string', 'max' => 30],
            [['enginenb', 'framenum'], 'string', 'max' => 50],
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
            'carnum' => '车牌号',
            'carbrand' => '车辆品牌',
            'carmode' => '型号',
            'cartype' => '车辆类型',
            'buydt' => '购买日期',
            'buyprice' => '购买价格',
            'enginenb' => '发动机号',
            'ispublic' => '是否公开使用',
            'optdt' => 'Optdt',
            'optid' => 'Optid',
            'optname' => 'Optname',
            'adddt' => 'Adddt',
            'createname' => 'Createname',
            'explain' => '说明',
            'state' => '状态@0|办理中,1|可用,2|维修中,3|报废',
            'framenum' => '车架号',
            'status' => 'Status',
        ];
    }
}
