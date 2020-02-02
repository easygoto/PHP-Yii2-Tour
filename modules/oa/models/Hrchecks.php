<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrchecks}}".
 *
 * @property int $id
 * @property int $mid 对应主表hrkaohem.id
 * @property int $sort 排序号
 * @property string $itemname 考评项目
 * @property string $weight 权重(%)
 * @property string $fenshu 占用分数
 */
class Hrchecks extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'itemname' => ['type' => 'string', 'filter' => 'like'],
        'weight' => ['type' => 'string', 'filter' => 'like'],
        'fenshu' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrchecks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort'], 'integer'],
            [['weight', 'fenshu'], 'number'],
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
            'fenshu' => '占用分数',
        ];
    }
}
