<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_goods}}".
 *
 * @property int $id
 * @property int $typeid 对应分类
 * @property string $num 物品编号
 * @property string $name
 * @property string $guige 规格
 * @property string $xinghao 型号
 * @property string $explain 说明
 * @property string $price 单价
 * @property string $unit 单位
 * @property string $adddt
 * @property string $optdt
 * @property int $optid
 * @property string $optname
 * @property int $stock 库存
 * @property int $stockcs 初始库存
 */
class Goods extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'typeid' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'guige' => ['type' => 'string', 'filter' => 'like'],
        'xinghao' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'price' => ['type' => 'string', 'filter' => 'like'],
        'unit' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'stock' => ['type' => 'int', 'filter' => 'like'],
        'stockcs' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_goods}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeid', 'optid', 'stock', 'stockcs'], 'integer'],
            [['price'], 'number'],
            [['adddt', 'optdt'], 'safe'],
            [['num', 'name'], 'string', 'max' => 30],
            [['guige', 'xinghao'], 'string', 'max' => 50],
            [['explain'], 'string', 'max' => 500],
            [['unit'], 'string', 'max' => 5],
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
            'typeid' => '对应分类',
            'num' => '物品编号',
            'name' => 'Name',
            'guige' => '规格',
            'xinghao' => '型号',
            'explain' => '说明',
            'price' => '单价',
            'unit' => '单位',
            'adddt' => 'Adddt',
            'optdt' => 'Optdt',
            'optid' => 'Optid',
            'optname' => 'Optname',
            'stock' => '库存',
            'stockcs' => '初始库存',
        ];
    }
}
