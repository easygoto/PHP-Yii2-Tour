<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_sealapl}}".
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
 * @property string $sealid 印章id
 * @property string $sealname 印章名称
 * @property int $isout 使用方式
 * @property string $mknum 关联模块单据
 */
class Sealapl extends \yii\db\ActiveRecord
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
        'sealid' => ['type' => 'string', 'filter' => 'like'],
        'sealname' => ['type' => 'string', 'filter' => 'like'],
        'isout' => ['type' => 'int', 'filter' => 'like'],
        'mknum' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_sealapl}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'isout'], 'integer'],
            [['optdt', 'applydt'], 'safe'],
            [['optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['sealid'], 'string', 'max' => 100],
            [['sealname'], 'string', 'max' => 200],
            [['mknum'], 'string', 'max' => 50],
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
            'sealid' => '印章id',
            'sealname' => '印章名称',
            'isout' => '使用方式',
            'mknum' => '关联模块单据',
        ];
    }
}
