<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqout}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $applyname 申请人姓名
 * @property string $outtime 外出时间
 * @property string $intime 回岗时间
 * @property string $address 外出地址
 * @property string $reason 外出事由
 * @property string $atype 外出类型@外出,出差
 * @property string $explain 说明
 * @property string $optdt 操作时间
 * @property int $status @0|待审核,1|审核通过,2|审核不通过
 * @property int $isturn @0|未提交,1|提交
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property int $isxj 是否销假@0|否,1|是
 * @property string $sicksm 销假说明
 */
class Kqout extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'applyname' => ['type' => 'string', 'filter' => 'like'],
        'outtime' => ['type' => 'string', 'filter' => 'like'],
        'intime' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'reason' => ['type' => 'string', 'filter' => 'like'],
        'atype' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'isxj' => ['type' => 'int', 'filter' => 'like'],
        'sicksm' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqout}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'status', 'isturn', 'optid', 'isxj'], 'integer'],
            [['outtime', 'intime', 'optdt', 'applydt'], 'safe'],
            [['applyname'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 50],
            [['reason', 'explain', 'sicksm'], 'string', 'max' => 500],
            [['atype', 'optname'], 'string', 'max' => 20],
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
            'applyname' => '申请人姓名',
            'outtime' => '外出时间',
            'intime' => '回岗时间',
            'address' => '外出地址',
            'reason' => '外出事由',
            'atype' => '外出类型@外出,出差',
            'explain' => '说明',
            'optdt' => '操作时间',
            'status' => '@0|待审核,1|审核通过,2|审核不通过',
            'isturn' => '@0|未提交,1|提交',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'isxj' => '是否销假@0|否,1|是',
            'sicksm' => '销假说明',
        ];
    }
}
