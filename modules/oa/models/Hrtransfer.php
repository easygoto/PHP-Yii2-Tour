<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrtransfer}}".
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
 * @property int $tranuid
 * @property string $tranname 要调动人
 * @property string $trantype 调动类型
 * @property string $olddeptname 原来部门
 * @property string $oldranking 原来职位
 * @property string $effectivedt 生效日期
 * @property string $newdeptname 调动后部门
 * @property int $newdeptid
 * @property string $newranking 调动后职位
 * @property int $isover 是否已完成
 */
class Hrtransfer extends \yii\db\ActiveRecord
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
        'tranuid' => ['type' => 'int', 'filter' => 'like'],
        'tranname' => ['type' => 'string', 'filter' => 'like'],
        'trantype' => ['type' => 'string', 'filter' => 'like'],
        'olddeptname' => ['type' => 'string', 'filter' => 'like'],
        'oldranking' => ['type' => 'string', 'filter' => 'like'],
        'effectivedt' => ['type' => 'string', 'filter' => 'like'],
        'newdeptname' => ['type' => 'string', 'filter' => 'like'],
        'newdeptid' => ['type' => 'int', 'filter' => 'like'],
        'newranking' => ['type' => 'string', 'filter' => 'like'],
        'isover' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_hrtransfer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'tranuid', 'newdeptid', 'isover'], 'integer'],
            [['optdt', 'applydt', 'effectivedt'], 'safe'],
            [['optname', 'tranname', 'trantype', 'oldranking', 'newranking'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['olddeptname', 'newdeptname'], 'string', 'max' => 50],
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
            'tranuid' => 'Tranuid',
            'tranname' => '要调动人',
            'trantype' => '调动类型',
            'olddeptname' => '原来部门',
            'oldranking' => '原来职位',
            'effectivedt' => '生效日期',
            'newdeptname' => '调动后部门',
            'newdeptid' => 'Newdeptid',
            'newranking' => '调动后职位',
            'isover' => '是否已完成',
        ];
    }
}
