<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_dept}}".
 *
 * @property int $id
 * @property string $num 编号
 * @property string $name
 * @property int $pid
 * @property int $sort
 * @property string $optdt
 * @property string $headman 负责人
 * @property string $headid
 */
class Dept extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'headman' => ['type' => 'string', 'filter' => 'like'],
        'headid' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_dept}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort'], 'integer'],
            [['optdt'], 'safe'],
            [['num'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 100],
            [['headman', 'headid'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '编号',
            'name' => 'Name',
            'pid' => 'Pid',
            'sort' => 'Sort',
            'optdt' => 'Optdt',
            'headman' => '负责人',
            'headid' => 'Headid',
        ];
    }
}
