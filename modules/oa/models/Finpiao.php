<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_finpiao}}".
 *
 * @property int $id
 * @property string $optname
 * @property string $optdt
 * @property int $optid
 * @property int $custid 对应客户ID
 * @property string $maicustname 购买方
 * @property int $maicustid 购买方Id
 * @property int $type 0开,1收到
 * @property string $custname 客户名称
 * @property string $daima 发票代码
 * @property string $haoma 发票号码
 * @property string $money 金额
 * @property string $opendt 开票日期
 * @property string $ptype 发票类型
 * @property int $status 状态
 * @property string $kainame 开票人
 * @property string $explain 说明
 */
class Finpiao extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
        'maicustname' => ['type' => 'string', 'filter' => 'like'],
        'maicustid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'custname' => ['type' => 'string', 'filter' => 'like'],
        'daima' => ['type' => 'string', 'filter' => 'like'],
        'haoma' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'opendt' => ['type' => 'string', 'filter' => 'like'],
        'ptype' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'kainame' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_finpiao}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optdt', 'opendt'], 'safe'],
            [['optid', 'custid', 'maicustid', 'type', 'status'], 'integer'],
            [['money'], 'number'],
            [['optname', 'daima', 'haoma', 'ptype', 'kainame'], 'string', 'max' => 50],
            [['maicustname', 'custname'], 'string', 'max' => 100],
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
            'optname' => 'Optname',
            'optdt' => 'Optdt',
            'optid' => 'Optid',
            'custid' => '对应客户ID',
            'maicustname' => '购买方',
            'maicustid' => '购买方Id',
            'type' => '0开,1收到',
            'custname' => '客户名称',
            'daima' => '发票代码',
            'haoma' => '发票号码',
            'money' => '金额',
            'opendt' => '开票日期',
            'ptype' => '发票类型',
            'status' => '状态',
            'kainame' => '开票人',
            'explain' => '说明',
        ];
    }
}
