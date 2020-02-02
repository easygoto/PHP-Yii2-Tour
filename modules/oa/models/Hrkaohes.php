<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrkaohes}}".
 *
 * @property int $id
 * @property int $mid 对应主表hrkaohem.id
 * @property int $sort 排序号
 * @property string $itemname 考评项目
 * @property string $weight 权重(%)
 */
class Hrkaohes extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'itemname' => ['type' => 'string', 'filter' => 'like'],
        'weight' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrkaohes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort'], 'integer'],
            [['weight'], 'number'],
            [['itemname'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应主表hrkaohem.id',
            'sort' => '排序号',
            'itemname' => '考评项目',
            'weight' => '权重(%)',
        ];
    }
}
