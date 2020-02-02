<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_custfina}}".
 *
 * @property int $id
 * @property int $htid 合同ID
 * @property string $htnum
 * @property string $dt 所属日期
 * @property int $uid
 * @property int $custid
 * @property string $custname 客户名称
 * @property string $optdt
 * @property string $optname
 * @property string $money
 * @property int $type 0收款单,1付款单
 * @property int $ispay 是否收款,付款
 * @property string $paydt 收付款时间
 * @property string $explain 说明
 * @property string $createdt 创建时间
 * @property string $createname
 * @property int $createid
 * @property int $ismove 是否转移的
 */
class Custfina extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'htid' => ['type' => 'int', 'filter' => 'like'],
        'htnum' => ['type' => 'string', 'filter' => 'like'],
        'dt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
        'custname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'ispay' => ['type' => 'int', 'filter' => 'like'],
        'paydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'createdt' => ['type' => 'string', 'filter' => 'like'],
        'createname' => ['type' => 'string', 'filter' => 'like'],
        'createid' => ['type' => 'int', 'filter' => 'like'],
        'ismove' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_custfina}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['htid', 'uid', 'custid', 'type', 'ispay', 'createid', 'ismove'], 'integer'],
            [['dt', 'optdt', 'paydt', 'createdt'], 'safe'],
            [['money'], 'number'],
            [['htnum'], 'string', 'max' => 20],
            [['custname'], 'string', 'max' => 50],
            [['optname', 'createname'], 'string', 'max' => 10],
            [['explain'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'htid' => '合同ID',
            'htnum' => 'Htnum',
            'dt' => '所属日期',
            'uid' => 'Uid',
            'custid' => 'Custid',
            'custname' => '客户名称',
            'optdt' => 'Optdt',
            'optname' => 'Optname',
            'money' => 'Money',
            'type' => '0收款单,1付款单',
            'ispay' => '是否收款,付款',
            'paydt' => '收付款时间',
            'explain' => '说明',
            'createdt' => '创建时间',
            'createname' => 'Createname',
            'createid' => 'Createid',
            'ismove' => '是否转移的',
        ];
    }
}
