<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_chao}}".
 *
 * @property int $id
 * @property int $modeid
 * @property string $table 对应表
 * @property int $mid 对应记录Id
 * @property int $uid 人员Id
 * @property string $csname 抄送给
 * @property string $csnameid
 */
class Flowchao extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'modeid' => ['type' => 'int', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'csname' => ['type' => 'string', 'filter' => 'like'],
        'csnameid' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_flow_chao}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modeid', 'mid', 'uid'], 'integer'],
            [['table', 'csnameid'], 'string', 'max' => 50],
            [['csname'], 'string', 'max' => 500],
            [['table', 'mid'], 'unique', 'targetAttribute' => ['table', 'mid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modeid' => 'Modeid',
            'table' => '对应表',
            'mid' => '对应记录Id',
            'uid' => '人员Id',
            'csname' => '抄送给',
            'csnameid' => 'Csnameid',
        ];
    }
}
