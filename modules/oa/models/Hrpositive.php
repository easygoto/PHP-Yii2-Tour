<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrpositive}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $applyname 申请人姓名
 * @property string $ranking 职位
 * @property string $entrydt 入职日期
 * @property string $syenddt 试用到期日
 * @property string $positivedt 转正日期
 * @property string $optdt 操作时间
 * @property string $explain 说明
 * @property int $status @0|待审核,1|审核通过,2|审核不通过
 * @property int $isturn @0|未提交,1|提交
 * @property int $isover
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 */
class Hrpositive extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'applyname' => ['type' => 'string', 'filter' => 'like'],
        'ranking' => ['type' => 'string', 'filter' => 'like'],
        'entrydt' => ['type' => 'string', 'filter' => 'like'],
        'syenddt' => ['type' => 'string', 'filter' => 'like'],
        'positivedt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'isover' => ['type' => 'int', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrpositive}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'status', 'isturn', 'isover', 'optid'], 'integer'],
            [['entrydt', 'syenddt', 'positivedt', 'optdt', 'applydt'], 'safe'],
            [['applyname', 'ranking'], 'string', 'max' => 30],
            [['explain'], 'string', 'max' => 500],
            [['optname'], 'string', 'max' => 20],
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
            'ranking' => '职位',
            'entrydt' => '入职日期',
            'syenddt' => '试用到期日',
            'positivedt' => '转正日期',
            'optdt' => '操作时间',
            'explain' => '说明',
            'status' => '@0|待审核,1|审核通过,2|审核不通过',
            'isturn' => '@0|未提交,1|提交',
            'isover' => 'Isover',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
        ];
    }
}
