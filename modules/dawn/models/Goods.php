<?php

namespace app\modules\dawn\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property string $id
 * @property string $name 商品
 * @property string $wholesale 批发价
 * @property string $selling_price 出售价
 * @property string $market_price 市场价
 * @property int $inventory 库存
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $operated_at 操作时间
 * @property int $status 状态
 * @property int $is_delete 是否删除
 */
class Goods extends \yii\db\ActiveRecord
{
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
            'id' => 'ID',
            'name' => 'Name',
            'wholesale' => 'Wholesale',
            'selling_price' => 'Selling Price',
            'market_price' => 'Market Price',
            'inventory' => 'Inventory',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'operated_at' => 'Operated At',
            'status' => 'Status',
            'is_delete' => 'Is Delete',
        ];
    }
}
