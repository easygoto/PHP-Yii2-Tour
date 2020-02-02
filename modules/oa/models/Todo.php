<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_todo}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $title 类型
 * @property string $mess 信息内容
 * @property int $status 状态@0|未读,1|已读
 * @property string $optdt 时间
 * @property string $table
 * @property int $mid
 * @property string $readdt 已读时间
 * @property string $tododt 提醒时间
 * @property string $modenum 对应模块编号
 */
class Todo extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'mess' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'readdt' => ['type' => 'string', 'filter' => 'like'],
        'tododt' => ['type' => 'string', 'filter' => 'like'],
        'modenum' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_todo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'status', 'mid'], 'integer'],
            [['optdt', 'readdt', 'tododt'], 'safe'],
            [['title', 'table'], 'string', 'max' => 50],
            [['mess'], 'string', 'max' => 500],
            [['modenum'], 'string', 'max' => 20],
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
            'title' => '类型',
            'mess' => '信息内容',
            'status' => '状态@0|未读,1|已读',
            'optdt' => '时间',
            'table' => 'Table',
            'mid' => 'Mid',
            'readdt' => '已读时间',
            'tododt' => '提醒时间',
            'modenum' => '对应模块编号',
        ];
    }
}
