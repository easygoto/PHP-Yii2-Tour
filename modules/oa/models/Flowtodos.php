<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_todos}}".
 *
 * @property int $id
 * @property string $modenum 对应模块编号
 * @property string $modename 模块名称
 * @property string $table 对应主表
 * @property int $mid 主表Id
 * @property int $uid 对应人员
 * @property string $adddt 添加时间
 * @property string $readdt 已读时间
 * @property int $isread 是否已读
 */
class Flowtodos extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'modenum' => ['type' => 'string', 'filter' => 'like'],
        'modename' => ['type' => 'string', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'readdt' => ['type' => 'string', 'filter' => 'like'],
        'isread' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_todos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'uid', 'isread'], 'integer'],
            [['adddt', 'readdt'], 'safe'],
            [['modenum', 'modename', 'table'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modenum' => '对应模块编号',
            'modename' => '模块名称',
            'table' => '对应主表',
            'mid' => '主表Id',
            'uid' => '对应人员',
            'adddt' => '添加时间',
            'readdt' => '已读时间',
            'isread' => '是否已读',
        ];
    }
}
