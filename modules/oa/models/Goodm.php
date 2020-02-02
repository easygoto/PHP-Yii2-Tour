<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_goodm}}".
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
 * @property int $type 0领用,1采购申请
 * @property string $money 费用
 * @property int $custid
 * @property string $custname 供应商名称
 * @property string $discount 优惠价格
 * @property int $state 0待出入库,2部分出入库,1已全部出入库
 */
class Goodm extends \yii\db\ActiveRecord
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
        'type' => ['type' => 'int', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
        'custname' => ['type' => 'string', 'filter' => 'like'],
        'discount' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_goodm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'type', 'custid', 'state'], 'integer'],
            [['optdt', 'applydt'], 'safe'],
            [['money', 'discount'], 'number'],
            [['optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['custname'], 'string', 'max' => 50],
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
            'type' => '0领用,1采购申请',
            'money' => '费用',
            'custid' => 'Custid',
            'custname' => '供应商名称',
            'discount' => '优惠价格',
            'state' => '0待出入库,2部分出入库,1已全部出入库',
        ];
    }
}
