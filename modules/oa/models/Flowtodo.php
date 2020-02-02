<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_todo}}".
 *
 * @property int $id
 * @property string $name 名称标题
 * @property string $num 编号
 * @property int $setid 对应模块
 * @property string $explain 说明
 * @property int $whereid 对应条件id
 * @property int $status 状态
 * @property string $receid
 * @property string $recename 通知给
 * @property string $changefields 改变字段
 * @property string $changecourse 对应步做id
 * @property int $boturn 提交时
 * @property int $boedit 编辑时
 * @property int $bochang 字段改变时
 * @property int $bodel 删除时
 * @property int $bozuofei 作废时
 * @property int $botong 步骤处理通过时
 * @property int $bobutong 步骤处理不通过时
 * @property int $bofinish 处理完成时
 * @property int $bozhui 追加说明时
 * @property int $bozhuan 流程转办时
 * @property int $toturn 是否通知给提交人
 * @property int $tocourse 是否通知给流程所有参与人
 * @property string $todofields 通知给主表上字段
 * @property string $summary 通知内容摘要
 * @property int $botask 计划任务
 * @property int $boping 评论时
 * @property int $bohuiz 回执时
 * @property int $tosuper 直属上级
 */
class Flowtodo extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'setid' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'whereid' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'changefields' => ['type' => 'string', 'filter' => 'like'],
        'changecourse' => ['type' => 'string', 'filter' => 'like'],
        'boturn' => ['type' => 'int', 'filter' => 'like'],
        'boedit' => ['type' => 'int', 'filter' => 'like'],
        'bochang' => ['type' => 'int', 'filter' => 'like'],
        'bodel' => ['type' => 'int', 'filter' => 'like'],
        'bozuofei' => ['type' => 'int', 'filter' => 'like'],
        'botong' => ['type' => 'int', 'filter' => 'like'],
        'bobutong' => ['type' => 'int', 'filter' => 'like'],
        'bofinish' => ['type' => 'int', 'filter' => 'like'],
        'bozhui' => ['type' => 'int', 'filter' => 'like'],
        'bozhuan' => ['type' => 'int', 'filter' => 'like'],
        'toturn' => ['type' => 'int', 'filter' => 'like'],
        'tocourse' => ['type' => 'int', 'filter' => 'like'],
        'todofields' => ['type' => 'string', 'filter' => 'like'],
        'summary' => ['type' => 'string', 'filter' => 'like'],
        'botask' => ['type' => 'int', 'filter' => 'like'],
        'boping' => ['type' => 'int', 'filter' => 'like'],
        'bohuiz' => ['type' => 'int', 'filter' => 'like'],
        'tosuper' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_todo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['setid', 'whereid', 'status', 'boturn', 'boedit', 'bochang', 'bodel', 'bozuofei', 'botong', 'bobutong', 'bofinish', 'bozhui', 'bozhuan', 'toturn', 'tocourse', 'botask', 'boping', 'bohuiz', 'tosuper'], 'integer'],
            [['name', 'num', 'changecourse'], 'string', 'max' => 30],
            [['explain'], 'string', 'max' => 100],
            [['receid', 'recename', 'todofields', 'summary'], 'string', 'max' => 500],
            [['changefields'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称标题',
            'num' => '编号',
            'setid' => '对应模块',
            'explain' => '说明',
            'whereid' => '对应条件id',
            'status' => '状态',
            'receid' => 'Receid',
            'recename' => '通知给',
            'changefields' => '改变字段',
            'changecourse' => '对应步做id',
            'boturn' => '提交时',
            'boedit' => '编辑时',
            'bochang' => '字段改变时',
            'bodel' => '删除时',
            'bozuofei' => '作废时',
            'botong' => '步骤处理通过时',
            'bobutong' => '步骤处理不通过时',
            'bofinish' => '处理完成时',
            'bozhui' => '追加说明时',
            'bozhuan' => '流程转办时',
            'toturn' => '是否通知给提交人',
            'tocourse' => '是否通知给流程所有参与人',
            'todofields' => '通知给主表上字段',
            'summary' => '通知内容摘要',
            'botask' => '计划任务',
            'boping' => '评论时',
            'bohuiz' => '回执时',
            'tosuper' => '直属上级',
        ];
    }
}
