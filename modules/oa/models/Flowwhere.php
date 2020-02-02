<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_where}}".
 *
 * @property int $id
 * @property int $setid 对应模块
 * @property string $num 编号
 * @property string $pnum 编号分组
 * @property string $name 条件名称
 * @property string $wheresstr 对应表条件
 * @property string $whereustr 用户条件
 * @property string $wheredstr 对应部门条件
 * @property int $sort
 * @property string $explain
 * @property string $receid
 * @property string $recename 包含用户
 * @property string $nreceid
 * @property string $nrecename 不包含用户
 * @property int $islb 是否在生成列表页面上显示
 * @property int $status 状态
 * @property string $syrid
 * @property string $syrname 此条件可适用对象
 */
class Flowwhere extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'setid' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'pnum' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'wheresstr' => ['type' => 'string', 'filter' => 'like'],
        'whereustr' => ['type' => 'string', 'filter' => 'like'],
        'wheredstr' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'nreceid' => ['type' => 'string', 'filter' => 'like'],
        'nrecename' => ['type' => 'string', 'filter' => 'like'],
        'islb' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'syrid' => ['type' => 'string', 'filter' => 'like'],
        'syrname' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_flow_where}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['setid', 'sort', 'islb', 'status'], 'integer'],
            [['num', 'pnum'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 50],
            [['wheresstr', 'whereustr', 'wheredstr'], 'string', 'max' => 500],
            [['explain', 'receid', 'recename', 'nreceid', 'nrecename', 'syrid', 'syrname'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setid' => '对应模块',
            'num' => '编号',
            'pnum' => '编号分组',
            'name' => '条件名称',
            'wheresstr' => '对应表条件',
            'whereustr' => '用户条件',
            'wheredstr' => '对应部门条件',
            'sort' => 'Sort',
            'explain' => 'Explain',
            'receid' => 'Receid',
            'recename' => '包含用户',
            'nreceid' => 'Nreceid',
            'nrecename' => '不包含用户',
            'islb' => '是否在生成列表页面上显示',
            'status' => '状态',
            'syrid' => 'Syrid',
            'syrname' => '此条件可适用对象',
        ];
    }
}
