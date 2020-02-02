<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_menu}}".
 *
 * @property int $id
 * @property string $name 显示名称
 * @property string $num 编号
 * @property int $sort
 * @property string $statusname
 * @property string $statuscolor
 * @property int $statusvalue 状态值
 * @property string $actname 动作名称
 * @property int $setid 对应模块
 * @property string $wherestr 显示条件
 * @property string $explain
 * @property int $status
 * @property int $islog
 * @property int $issm
 * @property int $type 类型
 * @property string $changeaction 触发的方法
 * @property string $fields
 * @property string $upgcont 更新内容
 * @property int $iszs 是否在详情页面显示
 */
class Flowmenu extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'statusname' => ['type' => 'string', 'filter' => 'like'],
        'statuscolor' => ['type' => 'string', 'filter' => 'like'],
        'statusvalue' => ['type' => 'int', 'filter' => 'like'],
        'actname' => ['type' => 'string', 'filter' => 'like'],
        'setid' => ['type' => 'int', 'filter' => 'like'],
        'wherestr' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'islog' => ['type' => 'int', 'filter' => 'like'],
        'issm' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'changeaction' => ['type' => 'string', 'filter' => 'like'],
        'fields' => ['type' => 'string', 'filter' => 'like'],
        'upgcont' => ['type' => 'string', 'filter' => 'like'],
        'iszs' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'statusvalue', 'setid', 'status', 'islog', 'issm', 'type', 'iszs'], 'integer'],
            [['name', 'num', 'statusname', 'statuscolor', 'actname', 'changeaction'], 'string', 'max' => 20],
            [['wherestr'], 'string', 'max' => 300],
            [['explain'], 'string', 'max' => 100],
            [['fields'], 'string', 'max' => 50],
            [['upgcont'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '显示名称',
            'num' => '编号',
            'sort' => 'Sort',
            'statusname' => 'Statusname',
            'statuscolor' => 'Statuscolor',
            'statusvalue' => '状态值',
            'actname' => '动作名称',
            'setid' => '对应模块',
            'wherestr' => '显示条件',
            'explain' => 'Explain',
            'status' => 'Status',
            'islog' => 'Islog',
            'issm' => 'Issm',
            'type' => '类型',
            'changeaction' => '触发的方法',
            'fields' => 'Fields',
            'upgcont' => '更新内容',
            'iszs' => '是否在详情页面显示',
        ];
    }
}
