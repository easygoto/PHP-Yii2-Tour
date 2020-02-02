<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_task}}".
 *
 * @property int $id
 * @property string $name
 * @property string $fenlei 类型分类
 * @property string $url 运行地址
 * @property string $type
 * @property string $time
 * @property string $ratecont
 * @property int $status 是否启用
 * @property int $state 最后状态
 * @property string $lastdt
 * @property string $optdt
 * @property int $sort
 * @property string $startdt 开始时间
 * @property string $lastcont
 * @property string $explain 说明
 * @property string $todoid
 * @property string $todoname
 */
class Task extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'fenlei' => ['type' => 'string', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'time' => ['type' => 'string', 'filter' => 'like'],
        'ratecont' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'lastdt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'lastcont' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'todoid' => ['type' => 'string', 'filter' => 'like'],
        'todoname' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_task}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'state', 'sort'], 'integer'],
            [['lastdt', 'optdt', 'startdt'], 'safe'],
            [['name', 'url', 'type'], 'string', 'max' => 100],
            [['fenlei'], 'string', 'max' => 10],
            [['time', 'explain', 'todoid', 'todoname'], 'string', 'max' => 200],
            [['ratecont', 'lastcont'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'fenlei' => '类型分类',
            'url' => '运行地址',
            'type' => 'Type',
            'time' => 'Time',
            'ratecont' => 'Ratecont',
            'status' => '是否启用',
            'state' => '最后状态',
            'lastdt' => 'Lastdt',
            'optdt' => 'Optdt',
            'sort' => 'Sort',
            'startdt' => '开始时间',
            'lastcont' => 'Lastcont',
            'explain' => '说明',
            'todoid' => 'Todoid',
            'todoname' => 'Todoname',
        ];
    }
}
