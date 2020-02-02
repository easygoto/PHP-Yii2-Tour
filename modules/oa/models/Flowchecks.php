<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_checks}}".
 *
 * @property int $id
 * @property string $table
 * @property int $mid
 * @property int $modeid
 * @property int $courseid
 * @property string $checkid
 * @property string $checkname
 * @property int $optid
 * @property string $optname
 * @property string $optdt
 * @property int $status 状态
 * @property int $addlx 类型1自定义,2撤回添加,3退回添加,4转移添加
 */
class Flowchecks extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'modeid' => ['type' => 'int', 'filter' => 'like'],
        'courseid' => ['type' => 'int', 'filter' => 'like'],
        'checkid' => ['type' => 'string', 'filter' => 'like'],
        'checkname' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'addlx' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_checks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'modeid', 'courseid', 'optid', 'status', 'addlx'], 'integer'],
            [['optdt'], 'safe'],
            [['table'], 'string', 'max' => 30],
            [['checkid', 'checkname'], 'string', 'max' => 100],
            [['optname'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'mid' => 'Mid',
            'modeid' => 'Modeid',
            'courseid' => 'Courseid',
            'checkid' => 'Checkid',
            'checkname' => 'Checkname',
            'optid' => 'Optid',
            'optname' => 'Optname',
            'optdt' => 'Optdt',
            'status' => '状态',
            'addlx' => '类型1自定义,2撤回添加,3退回添加,4转移添加',
        ];
    }
}
