<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_customer}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $type 客户类型
 * @property int $uid 所属人
 * @property string $optdt
 * @property string $optname
 * @property string $linkname 联系人
 * @property string $unitname 单位名称
 * @property string $laiyuan 来源
 * @property string $tel
 * @property string $mobile
 * @property string $email
 * @property string $explain
 * @property string $address
 * @property string $routeline
 * @property string $url 主页地址
 * @property int $status 启用停用
 * @property string $adddt 添加时间
 * @property string $createname
 * @property int $createid
 * @property string $shate 共享给
 * @property string $shateid
 * @property int $isgys 是否供应商
 * @property int $isstat 是否标*客户
 * @property int $fzid
 * @property string $fzname 客户负责人
 * @property int $htshu 合同数
 * @property string $moneyz 销售总额
 * @property string $moneyd 待收金额
 * @property string $sheng 所在省
 * @property string $shi 所在市
 * @property int $isgh 是否放入公海
 * @property string $lastdt 最后跟进时间
 * @property string $shibieid 纳税识别号
 * @property string $openbank 开户行
 * @property string $cardid 开户帐号
 */
class Customer extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'linkname' => ['type' => 'string', 'filter' => 'like'],
        'unitname' => ['type' => 'string', 'filter' => 'like'],
        'laiyuan' => ['type' => 'string', 'filter' => 'like'],
        'tel' => ['type' => 'string', 'filter' => 'like'],
        'mobile' => ['type' => 'string', 'filter' => 'like'],
        'email' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'routeline' => ['type' => 'string', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'createname' => ['type' => 'string', 'filter' => 'like'],
        'createid' => ['type' => 'int', 'filter' => 'like'],
        'shate' => ['type' => 'string', 'filter' => 'like'],
        'shateid' => ['type' => 'string', 'filter' => 'like'],
        'isgys' => ['type' => 'int', 'filter' => 'like'],
        'isstat' => ['type' => 'int', 'filter' => 'like'],
        'fzid' => ['type' => 'int', 'filter' => 'like'],
        'fzname' => ['type' => 'string', 'filter' => 'like'],
        'htshu' => ['type' => 'int', 'filter' => 'like'],
        'moneyz' => ['type' => 'string', 'filter' => 'like'],
        'moneyd' => ['type' => 'string', 'filter' => 'like'],
        'sheng' => ['type' => 'string', 'filter' => 'like'],
        'shi' => ['type' => 'string', 'filter' => 'like'],
        'isgh' => ['type' => 'int', 'filter' => 'like'],
        'lastdt' => ['type' => 'string', 'filter' => 'like'],
        'shibieid' => ['type' => 'string', 'filter' => 'like'],
        'openbank' => ['type' => 'string', 'filter' => 'like'],
        'cardid' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_customer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'status', 'createid', 'isgys', 'isstat', 'fzid', 'htshu', 'isgh'], 'integer'],
            [['optdt', 'adddt', 'lastdt'], 'safe'],
            [['moneyz', 'moneyd'], 'number'],
            [['name', 'tel', 'mobile', 'email', 'url', 'shate', 'shateid', 'sheng', 'shi', 'cardid'], 'string', 'max' => 50],
            [['type', 'linkname', 'laiyuan', 'fzname'], 'string', 'max' => 20],
            [['optname', 'createname'], 'string', 'max' => 10],
            [['unitname', 'address', 'routeline', 'openbank'], 'string', 'max' => 100],
            [['explain'], 'string', 'max' => 500],
            [['shibieid'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'type' => '客户类型',
            'uid' => '所属人',
            'optdt' => 'Optdt',
            'optname' => 'Optname',
            'linkname' => '联系人',
            'unitname' => '单位名称',
            'laiyuan' => '来源',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'explain' => 'Explain',
            'address' => 'Address',
            'routeline' => 'Routeline',
            'url' => '主页地址',
            'status' => '启用停用',
            'adddt' => '添加时间',
            'createname' => 'Createname',
            'createid' => 'Createid',
            'shate' => '共享给',
            'shateid' => 'Shateid',
            'isgys' => '是否供应商',
            'isstat' => '是否标*客户',
            'fzid' => 'Fzid',
            'fzname' => '客户负责人',
            'htshu' => '合同数',
            'moneyz' => '销售总额',
            'moneyd' => '待收金额',
            'sheng' => '所在省',
            'shi' => '所在市',
            'isgh' => '是否放入公海',
            'lastdt' => '最后跟进时间',
            'shibieid' => '纳税识别号',
            'openbank' => '开户行',
            'cardid' => '开户帐号',
        ];
    }
}
