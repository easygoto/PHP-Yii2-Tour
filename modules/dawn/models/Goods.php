<?php

namespace app\modules\dawn\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%dawn_goods}}".
 *
 * @property string $id
 * @property string $name          商品
 * @property float  $wholesale     批发价
 * @property float  $selling_price 出售价
 * @property float  $market_price  市场价
 * @property int    $inventory     库存
 * @property string $created_at    创建时间
 * @property string $updated_at    更新时间
 * @property string $operated_at   操作时间
 * @property int    $status        状态
 * @property int    $is_delete     是否删除
 */
class Goods extends \yii\db\ActiveRecord
{
    const STATUS = [
        'NORMAL'  => 1,
        'DISABLE' => 2,
    ];

    const FIELD_DETAIL = [
        'id'            => ['type' => 'string', 'filter' => 'like'],
        'name'          => ['type' => 'string', 'filter' => 'like'],
        'wholesale'     => ['type' => 'float', 'filter' => 'range'],
        'selling_price' => ['type' => 'float', 'filter' => 'range'],
        'market_price'  => ['type' => 'float', 'filter' => 'range'],
        'inventory'     => ['type' => 'int', 'filter' => 'range'],
        'created_at'    => ['type' => 'string', 'filter' => 'range'],
        'updated_at'    => ['type' => 'string', 'filter' => 'range'],
        'operated_at'   => ['type' => 'string', 'filter' => 'range'],
        'status'        => ['type' => 'int', 'filter' => 'equals'],
        'is_delete'     => ['type' => 'int', 'filter' => 'equals'],
    ];

    const RESULT_FILTER = [
        'all'    => [
            'include' => null,
            'exclude' => ['is_delete'],
        ],
        'list'   => [
            'include' => null,
            'exclude' => ['is_delete'],
        ],
        'detail' => [
            'include' => null,
            'exclude' => ['is_delete'],
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dawn_goods}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wholesale', 'selling_price', 'market_price'], 'number'],
            [['inventory', 'status', 'is_delete'], 'integer'],
            [['created_at', 'updated_at', 'operated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'name'          => '商品',
            'wholesale'     => '批发价',
            'selling_price' => '出售价',
            'market_price'  => '市场价',
            'inventory'     => '库存',
            'created_at'    => '创建时间',
            'updated_at'    => '更新时间',
            'operated_at'   => '操作时间',
            'status'        => '状态',
            'is_delete'     => '是否删除',
        ];
    }
}
