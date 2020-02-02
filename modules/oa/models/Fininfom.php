<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_fininfom}}".
 *
 * @property int $id
 * @property int $type 类型@0|报销单,1|出差报销,2|借款单,3|还款单,4|付款申请,5|开票申请
 * @property int $uid
 * @property string $money 金额
 * @property string $moneycn 大写金额
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status
 * @property int $isturn
 * @property int $bills 附单据(张)
 * @property string $paytype 付款方式
 * @property string $fullname 收款人全称
 * @property string $cardid 收款帐号
 * @property string $openbank 开户行
 * @property string $purpose 用途
 * @property string $purresult
 * @property string $paydt 付款日期
 * @property string $num 合同号/订单号
 * @property string $name 开票名称
 * @property string $shibieid 纳税识别号
 * @property string $address 公司地址
 * @property string $tel 电话
 * @property int $custid 对应客户ID
 */
class Fininfom extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'moneycn' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'bills' => ['type' => 'int', 'filter' => 'like'],
        'paytype' => ['type' => 'string', 'filter' => 'like'],
        'fullname' => ['type' => 'string', 'filter' => 'like'],
        'cardid' => ['type' => 'string', 'filter' => 'like'],
        'openbank' => ['type' => 'string', 'filter' => 'like'],
        'purpose' => ['type' => 'string', 'filter' => 'like'],
        'purresult' => ['type' => 'string', 'filter' => 'like'],
        'paydt' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'shibieid' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'tel' => ['type' => 'string', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_fininfom}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'uid', 'optid', 'status', 'isturn', 'bills', 'custid'], 'integer'],
            [['money'], 'number'],
            [['optdt', 'applydt', 'paydt'], 'safe'],
            [['moneycn', 'fullname', 'purpose', 'purresult', 'address'], 'string', 'max' => 100],
            [['optname', 'paytype'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['cardid', 'openbank', 'name', 'shibieid', 'tel'], 'string', 'max' => 50],
            [['num'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型@0|报销单,1|出差报销,2|借款单,3|还款单,4|付款申请,5|开票申请',
            'uid' => 'Uid',
            'money' => '金额',
            'moneycn' => '大写金额',
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => 'Status',
            'isturn' => 'Isturn',
            'bills' => '附单据(张)',
            'paytype' => '付款方式',
            'fullname' => '收款人全称',
            'cardid' => '收款帐号',
            'openbank' => '开户行',
            'purpose' => '用途',
            'purresult' => 'Purresult',
            'paydt' => '付款日期',
            'num' => '合同号/订单号',
            'name' => '开票名称',
            'shibieid' => '纳税识别号',
            'address' => '公司地址',
            'tel' => '电话',
            'custid' => '对应客户ID',
        ];
    }
}
