<?php

namespace app\modules\dawn\models;

use Yii;

/**
 * This is the model class for table "b_goods_desc".
 *
 * @property string $id
 * @property string $goods_id
 * @property string $description
 */
class GoodsDesc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_goods_desc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'goods_id'], 'required'],
            [['id', 'goods_id'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'description' => 'Description',
        ];
    }
}
