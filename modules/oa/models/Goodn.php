<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_goodn}}".
 *
 * @property int $id
 * @property int $mid 对应主表
 * @property int $aid 物品Id
 * @property int $count 数量
 * @property int $couns 已出库入库数跟count相等时就全部了
 * @property int $sort
 * @property string $unit 单位
 * @property string $price 单价
 */
class Goodn extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'aid' => ['type' => 'int', 'filter' => 'like'],
        'count' => ['type' => 'int', 'filter' => 'like'],
        'couns' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'unit' => ['type' => 'string', 'filter' => 'like'],
        'price' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_goodn}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'aid', 'count', 'couns', 'sort'], 'integer'],
            [['price'], 'number'],
            [['unit'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应主表',
            'aid' => '物品Id',
            'count' => '数量',
            'couns' => '已出库入库数跟count相等时就全部了',
            'sort' => 'Sort',
            'unit' => '单位',
            'price' => '单价',
        ];
    }
}
