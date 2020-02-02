<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_project}}".
 *
 * @property int $id
 * @property int $pid
 * @property string $type 项目类型
 * @property string $num 编号
 * @property int $status
 * @property string $title 项目名称
 * @property string $startdt 开始时间
 * @property string $enddt 预计结束时间
 * @property string $fuze 负责人
 * @property string $fuzeid
 * @property string $runuser 执行人员
 * @property string $runuserid
 * @property int $progress 进度
 * @property string $viewuser 授权查看
 * @property string $viewuserid
 * @property string $content 说明备注
 * @property int $optid
 * @property string $optname 操作人
 * @property string $optdt
 * @property string $adddt 添加时间
 * @property int $sort 排序
 */
class Project extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'fuze' => ['type' => 'string', 'filter' => 'like'],
        'fuzeid' => ['type' => 'string', 'filter' => 'like'],
        'runuser' => ['type' => 'string', 'filter' => 'like'],
        'runuserid' => ['type' => 'string', 'filter' => 'like'],
        'progress' => ['type' => 'int', 'filter' => 'like'],
        'viewuser' => ['type' => 'string', 'filter' => 'like'],
        'viewuserid' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_project}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'progress', 'optid', 'sort'], 'integer'],
            [['startdt', 'enddt', 'optdt', 'adddt'], 'safe'],
            [['type', 'num', 'fuze', 'optname'], 'string', 'max' => 20],
            [['title', 'runuser', 'runuserid', 'viewuser', 'viewuserid'], 'string', 'max' => 100],
            [['fuzeid'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'type' => '项目类型',
            'num' => '编号',
            'status' => 'Status',
            'title' => '项目名称',
            'startdt' => '开始时间',
            'enddt' => '预计结束时间',
            'fuze' => '负责人',
            'fuzeid' => 'Fuzeid',
            'runuser' => '执行人员',
            'runuserid' => 'Runuserid',
            'progress' => '进度',
            'viewuser' => '授权查看',
            'viewuserid' => 'Viewuserid',
            'content' => '说明备注',
            'optid' => 'Optid',
            'optname' => '操作人',
            'optdt' => 'Optdt',
            'adddt' => '添加时间',
            'sort' => '排序',
        ];
    }
}
