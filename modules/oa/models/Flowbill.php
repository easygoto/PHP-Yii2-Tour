<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_bill}}".
 *
 * @property int $id
 * @property string $sericnum 单号
 * @property string $table 对应表
 * @property int $mid 主id
 * @property int $modeid 模块id
 * @property string $modename 模块名称
 * @property string $uname 申请人姓名
 * @property int $uid 用户id
 * @property string $udeptname 申请人部门
 * @property string $optdt 操作时间
 * @property int $optid 操作人Id
 * @property string $optname 操作人
 * @property string $allcheckid @所有审核人
 * @property int $isdel 是否删除
 * @property int $nstatus 当前状态值
 * @property string $applydt 申请日期
 * @property string $nstatustext 当前状态
 * @property int $status
 * @property int $nowcourseid 当前步骤Id
 * @property string $nowcheckid 当前审核人id
 * @property string $nowcheckname 当前审核人
 * @property string $checksm 最后审核说明
 * @property string $updt 最后更新时间
 * @property string $createdt 创建时间
 * @property int $tuiid 退回flow_log.Id
 * @property int $isturn 是否已提交了
 */
class Flowbill extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'sericnum' => ['type' => 'string', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'modeid' => ['type' => 'int', 'filter' => 'like'],
        'modename' => ['type' => 'string', 'filter' => 'like'],
        'uname' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'udeptname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'allcheckid' => ['type' => 'string', 'filter' => 'like'],
        'isdel' => ['type' => 'int', 'filter' => 'like'],
        'nstatus' => ['type' => 'int', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'nstatustext' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'nowcourseid' => ['type' => 'int', 'filter' => 'like'],
        'nowcheckid' => ['type' => 'string', 'filter' => 'like'],
        'nowcheckname' => ['type' => 'string', 'filter' => 'like'],
        'checksm' => ['type' => 'string', 'filter' => 'like'],
        'updt' => ['type' => 'string', 'filter' => 'like'],
        'createdt' => ['type' => 'string', 'filter' => 'like'],
        'tuiid' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_bill}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'modeid', 'uid', 'optid', 'isdel', 'nstatus', 'status', 'nowcourseid', 'tuiid', 'isturn'], 'integer'],
            [['optdt', 'applydt', 'updt', 'createdt'], 'safe'],
            [['sericnum', 'table'], 'string', 'max' => 50],
            [['modename', 'uname', 'optname'], 'string', 'max' => 20],
            [['udeptname'], 'string', 'max' => 30],
            [['allcheckid', 'nowcheckid', 'nowcheckname'], 'string', 'max' => 500],
            [['nstatustext'], 'string', 'max' => 100],
            [['checksm'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sericnum' => '单号',
            'table' => '对应表',
            'mid' => '主id',
            'modeid' => '模块id',
            'modename' => '模块名称',
            'uname' => '申请人姓名',
            'uid' => '用户id',
            'udeptname' => '申请人部门',
            'optdt' => '操作时间',
            'optid' => '操作人Id',
            'optname' => '操作人',
            'allcheckid' => '@所有审核人',
            'isdel' => '是否删除',
            'nstatus' => '当前状态值',
            'applydt' => '申请日期',
            'nstatustext' => '当前状态',
            'status' => 'Status',
            'nowcourseid' => '当前步骤Id',
            'nowcheckid' => '当前审核人id',
            'nowcheckname' => '当前审核人',
            'checksm' => '最后审核说明',
            'updt' => '最后更新时间',
            'createdt' => '创建时间',
            'tuiid' => '退回flow_log.Id',
            'isturn' => '是否已提交了',
        ];
    }
}
