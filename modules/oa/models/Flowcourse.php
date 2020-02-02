<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_course}}".
 *
 * @property int $id
 * @property int $mid 上级ID
 * @property int $nid 下级步骤ID
 * @property int $setid 模块ID
 * @property string $name 步骤名称
 * @property string $num
 * @property string $checktype 审核人类型
 * @property string $checktypeid
 * @property string $checktypename 审核人
 * @property int $sort
 * @property int $whereid 流程模块条件下的Id
 * @property string $where 审核条件
 * @property string $explain 说明
 * @property string $optdt
 * @property int $status
 * @property string $courseact 审核动作
 * @property int $checkshu 至少几人审核 ,0全部
 * @property string $checkfields 审核处理表单
 * @property int $pid 上级Id(弃用)
 * @property int $optid 操作人id
 * @property string $optname 操作人姓名
 * @property string $receid 适用对象id
 * @property string $recename 适用对象
 * @property int $iszf 是否可以转给他人办理
 * @property int $isqm 手写签名0不用,1都需要,2只需要通过,3只需要不通过
 * @property int $coursetype 审批方式0顺序,1前置审批,2后置审批
 * @property int $zshtime 超时时间(分钟)
 * @property int $zshstate 自动审核类型
 * @property string $zbrangeame 转办人员可选范围
 * @property string $zbrangeid 转办人员可选范围ID
 * @property int $smlx 处理说明类型
 * @property int $wjlx 相关文件类型
 * @property int $isxgfj 审批时是否可直接编辑附件
 */
class Flowcourse extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'nid' => ['type' => 'int', 'filter' => 'like'],
        'setid' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'checktype' => ['type' => 'string', 'filter' => 'like'],
        'checktypeid' => ['type' => 'string', 'filter' => 'like'],
        'checktypename' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'whereid' => ['type' => 'int', 'filter' => 'like'],
        'where' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'courseact' => ['type' => 'string', 'filter' => 'like'],
        'checkshu' => ['type' => 'int', 'filter' => 'like'],
        'checkfields' => ['type' => 'string', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'iszf' => ['type' => 'int', 'filter' => 'like'],
        'isqm' => ['type' => 'int', 'filter' => 'like'],
        'coursetype' => ['type' => 'int', 'filter' => 'like'],
        'zshtime' => ['type' => 'int', 'filter' => 'like'],
        'zshstate' => ['type' => 'int', 'filter' => 'like'],
        'zbrangeame' => ['type' => 'string', 'filter' => 'like'],
        'zbrangeid' => ['type' => 'string', 'filter' => 'like'],
        'smlx' => ['type' => 'int', 'filter' => 'like'],
        'wjlx' => ['type' => 'int', 'filter' => 'like'],
        'isxgfj' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_course}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'nid', 'setid', 'sort', 'whereid', 'status', 'checkshu', 'pid', 'optid', 'iszf', 'isqm', 'coursetype', 'zshtime', 'zshstate', 'smlx', 'wjlx', 'isxgfj'], 'integer'],
            [['optdt'], 'safe'],
            [['name', 'num', 'checktype', 'optname'], 'string', 'max' => 20],
            [['checktypeid', 'checktypename', 'zbrangeame', 'zbrangeid'], 'string', 'max' => 200],
            [['where', 'checkfields'], 'string', 'max' => 500],
            [['explain'], 'string', 'max' => 100],
            [['courseact'], 'string', 'max' => 50],
            [['receid', 'recename'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '上级ID',
            'nid' => '下级步骤ID',
            'setid' => '模块ID',
            'name' => '步骤名称',
            'num' => 'Num',
            'checktype' => '审核人类型',
            'checktypeid' => 'Checktypeid',
            'checktypename' => '审核人',
            'sort' => 'Sort',
            'whereid' => '流程模块条件下的Id',
            'where' => '审核条件',
            'explain' => '说明',
            'optdt' => 'Optdt',
            'status' => 'Status',
            'courseact' => '审核动作',
            'checkshu' => '至少几人审核 ,0全部',
            'checkfields' => '审核处理表单',
            'pid' => '上级Id(弃用)',
            'optid' => '操作人id',
            'optname' => '操作人姓名',
            'receid' => '适用对象id',
            'recename' => '适用对象',
            'iszf' => '是否可以转给他人办理',
            'isqm' => '手写签名0不用,1都需要,2只需要通过,3只需要不通过',
            'coursetype' => '审批方式0顺序,1前置审批,2后置审批',
            'zshtime' => '超时时间(分钟)',
            'zshstate' => '自动审核类型',
            'zbrangeame' => '转办人员可选范围',
            'zbrangeid' => '转办人员可选范围ID',
            'smlx' => '处理说明类型',
            'wjlx' => '相关文件类型',
            'isxgfj' => '审批时是否可直接编辑附件',
        ];
    }
}
