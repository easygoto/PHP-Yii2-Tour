<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_set}}".
 *
 * @property int $id
 * @property string $name 模块名称
 * @property string $num 模块编号
 * @property int $sort 排序
 * @property string $table 对应的表
 * @property string $where 相关条件
 * @property string $summary 摘要
 * @property string $summarx 应用摘要
 * @property string $type 分类
 * @property int $pctx pc端提醒
 * @property int $mctx app提醒
 * @property int $wxtx 微信提醒
 * @property int $emtx 是否邮件提醒
 * @property string $sericnum 编号规则
 * @property int $isflow 是否有流程
 * @property string $receid
 * @property string $recename 针对对象
 * @property string $optdt 操作时间
 * @property int $status
 * @property int $islu 是否可录入
 * @property string $tables 多行子表
 * @property string $names 多行子表名称
 * @property string $statusstr 状态值设置
 * @property int $isgbjl 是否关闭操作记录
 * @property int $isgbcy 是否不显示查阅记录
 * @property int $isscl 是否生成列表页
 * @property int $isup 更新时是否同步
 * @property int $ddtx 是否钉钉提醒
 * @property int $isbxs 录入页面是否不显示流程图
 * @property int $lbztxs 列表页状态搜索显示0默认,1必须显示,2显示
 * @property int $isflowlx 从新提交时0默认，1从新走流程
 * @property int $iscs 是否自定义抄送
 * @property int $zfeitime 超过分钟自动作废
 * @property int $ispl 是否开启评论
 * @property int $istxset 是否开启单据提醒设置
 * @property int $ishz 回执确认0不开启,1必须选择,2可选
 */
class Flowset extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'where' => ['type' => 'string', 'filter' => 'like'],
        'summary' => ['type' => 'string', 'filter' => 'like'],
        'summarx' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'pctx' => ['type' => 'int', 'filter' => 'like'],
        'mctx' => ['type' => 'int', 'filter' => 'like'],
        'wxtx' => ['type' => 'int', 'filter' => 'like'],
        'emtx' => ['type' => 'int', 'filter' => 'like'],
        'sericnum' => ['type' => 'string', 'filter' => 'like'],
        'isflow' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'islu' => ['type' => 'int', 'filter' => 'like'],
        'tables' => ['type' => 'string', 'filter' => 'like'],
        'names' => ['type' => 'string', 'filter' => 'like'],
        'statusstr' => ['type' => 'string', 'filter' => 'like'],
        'isgbjl' => ['type' => 'int', 'filter' => 'like'],
        'isgbcy' => ['type' => 'int', 'filter' => 'like'],
        'isscl' => ['type' => 'int', 'filter' => 'like'],
        'isup' => ['type' => 'int', 'filter' => 'like'],
        'ddtx' => ['type' => 'int', 'filter' => 'like'],
        'isbxs' => ['type' => 'int', 'filter' => 'like'],
        'lbztxs' => ['type' => 'int', 'filter' => 'like'],
        'isflowlx' => ['type' => 'int', 'filter' => 'like'],
        'iscs' => ['type' => 'int', 'filter' => 'like'],
        'zfeitime' => ['type' => 'int', 'filter' => 'like'],
        'ispl' => ['type' => 'int', 'filter' => 'like'],
        'istxset' => ['type' => 'int', 'filter' => 'like'],
        'ishz' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_set}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num'], 'required'],
            [['sort', 'pctx', 'mctx', 'wxtx', 'emtx', 'isflow', 'status', 'islu', 'isgbjl', 'isgbcy', 'isscl', 'isup', 'ddtx', 'isbxs', 'lbztxs', 'isflowlx', 'iscs', 'zfeitime', 'ispl', 'istxset', 'ishz'], 'integer'],
            [['optdt'], 'safe'],
            [['name', 'table', 'sericnum'], 'string', 'max' => 50],
            [['num'], 'string', 'max' => 30],
            [['where', 'summary', 'summarx', 'tables', 'names', 'statusstr'], 'string', 'max' => 500],
            [['type'], 'string', 'max' => 20],
            [['receid', 'recename'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '模块名称',
            'num' => '模块编号',
            'sort' => '排序',
            'table' => '对应的表',
            'where' => '相关条件',
            'summary' => '摘要',
            'summarx' => '应用摘要',
            'type' => '分类',
            'pctx' => 'pc端提醒',
            'mctx' => 'app提醒',
            'wxtx' => '微信提醒',
            'emtx' => '是否邮件提醒',
            'sericnum' => '编号规则',
            'isflow' => '是否有流程',
            'receid' => 'Receid',
            'recename' => '针对对象',
            'optdt' => '操作时间',
            'status' => 'Status',
            'islu' => '是否可录入',
            'tables' => '多行子表',
            'names' => '多行子表名称',
            'statusstr' => '状态值设置',
            'isgbjl' => '是否关闭操作记录',
            'isgbcy' => '是否不显示查阅记录',
            'isscl' => '是否生成列表页',
            'isup' => '更新时是否同步',
            'ddtx' => '是否钉钉提醒',
            'isbxs' => '录入页面是否不显示流程图',
            'lbztxs' => '列表页状态搜索显示0默认,1必须显示,2显示',
            'isflowlx' => '从新提交时0默认，1从新走流程',
            'iscs' => '是否自定义抄送',
            'zfeitime' => '超过分钟自动作废',
            'ispl' => '是否开启评论',
            'istxset' => '是否开启单据提醒设置',
            'ishz' => '回执确认0不开启,1必须选择,2可选',
        ];
    }
}
