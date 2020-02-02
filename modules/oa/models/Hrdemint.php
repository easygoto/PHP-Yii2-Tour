<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrdemint}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property int $type 0需求,1面试
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $isturn 是否提交
 * @property string $zhiwei 需求职位
 * @property string $xinzi 薪资
 * @property int $renshu 需求人数
 * @property string $content 职位要求/面试者简历
 * @property string $bumen 需求部门
 * @property string $name 姓名
 * @property string $msuser 面试人员
 * @property string $msuserid 面试人员的ID
 * @property string $mscont 面试记录
 * @property int $state 面试结果0待面试,1录用,2不适合
 * @property string $msdt 面试时间
 */
class Hrdemint extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'zhiwei' => ['type' => 'string', 'filter' => 'like'],
        'xinzi' => ['type' => 'string', 'filter' => 'like'],
        'renshu' => ['type' => 'int', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'bumen' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'msuser' => ['type' => 'string', 'filter' => 'like'],
        'msuserid' => ['type' => 'string', 'filter' => 'like'],
        'mscont' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'msdt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrdemint}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'type', 'status', 'isturn', 'renshu', 'state'], 'integer'],
            [['optdt', 'applydt', 'msdt'], 'safe'],
            [['optname', 'name'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['zhiwei', 'xinzi', 'bumen', 'msuser', 'msuserid'], 'string', 'max' => 50],
            [['content', 'mscont'], 'string', 'max' => 2000],
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
            'type' => '0需求,1面试',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => '状态',
            'isturn' => '是否提交',
            'zhiwei' => '需求职位',
            'xinzi' => '薪资',
            'renshu' => '需求人数',
            'content' => '职位要求/面试者简历',
            'bumen' => '需求部门',
            'name' => '姓名',
            'msuser' => '面试人员',
            'msuserid' => '面试人员的ID',
            'mscont' => '面试记录',
            'state' => '面试结果0待面试,1录用,2不适合',
            'msdt' => '面试时间',
        ];
    }
}
