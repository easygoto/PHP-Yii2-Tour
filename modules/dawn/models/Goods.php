<?php

namespace app\modules\dawn\models;

use app\web\Yii;

/**
 * This is the model class for table "b_goods".
 *
 * @property string $id
 * @property string $name
 * @property string $wholesale
 * @property string $selling_price
 * @property string $market_price
 * @property integer $inventory
 * @property string $created_at
 * @property string $updated_at
 * @property string $operated_at
 * @property integer $status
 * @property integer $is_delete
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wholesale', 'selling_price', 'market_price'], 'number'],
            [['inventory', 'status', 'is_delete'], 'integer'],
            [['created_at', 'updated_at', 'operated_at'], 'safe'],
            [['is_delete'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '商品ID',
            'name' => '商品名称',
            'wholesale' => '批发价',
            'selling_price' => '出售价',
            'market_price' => '市场价',
            'inventory' => '库存',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'operated_at' => '操作时间',
            'status' => '状态',
            'is_delete' => '是否删除',
        ];
    }
}
