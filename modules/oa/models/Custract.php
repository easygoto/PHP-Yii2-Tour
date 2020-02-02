<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_custract}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $num 合同编号
 * @property string $optdt 操作时间
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $custid
 * @property string $custname 客户名称
 * @property string $linkman 客户联系人
 * @property string $money 合同金额
 * @property string $moneys 待收金额
 * @property string $startdt 生效日期
 * @property string $enddt 截止日期
 * @property string $content 合同内容
 * @property int $saleid 销售机会Id
 * @property int $isturn 是否提交
 * @property string $signdt 签约日期
 * @property int $type 0收款合同，1付款合同
 * @property int $ispay 0待,1已完成,2部分
 * @property int $isover 是否已全部创建收付款单
 * @property string $createname
 * @property int $createid
 */
class Custract extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
        'custname' => ['type' => 'string', 'filter' => 'like'],
        'linkman' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'moneys' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'saleid' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'signdt' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'ispay' => ['type' => 'int', 'filter' => 'like'],
        'isover' => ['type' => 'int', 'filter' => 'like'],
        'createname' => ['type' => 'string', 'filter' => 'like'],
        'createid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_custract}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'status', 'custid', 'saleid', 'isturn', 'type', 'ispay', 'isover', 'createid'], 'integer'],
            [['optdt', 'applydt', 'startdt', 'enddt', 'signdt'], 'safe'],
            [['money', 'moneys'], 'number'],
            [['content'], 'string'],
            [['num'], 'string', 'max' => 30],
            [['optname', 'linkman', 'createname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['custname'], 'string', 'max' => 255],
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
            'num' => '合同编号',
            'optdt' => '操作时间',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => '状态',
            'custid' => 'Custid',
            'custname' => '客户名称',
            'linkman' => '客户联系人',
            'money' => '合同金额',
            'moneys' => '待收金额',
            'startdt' => '生效日期',
            'enddt' => '截止日期',
            'content' => '合同内容',
            'saleid' => '销售机会Id',
            'isturn' => '是否提交',
            'signdt' => '签约日期',
            'type' => '0收款合同，1付款合同',
            'ispay' => '0待,1已完成,2部分',
            'isover' => '是否已全部创建收付款单',
            'createname' => 'Createname',
            'createid' => 'Createid',
        ];
    }
}
