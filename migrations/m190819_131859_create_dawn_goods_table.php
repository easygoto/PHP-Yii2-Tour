<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods}}`.
 */
class m190819_131859_create_dawn_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dawn_goods}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'name' => $this->string(100)->notNull()->defaultValue('')->comment('商品'),
            'wholesale' => $this->decimal(10, 2)->unsigned()->notNull()->defaultValue(0.00)->comment('批发价'),
            'selling_price' => $this->decimal(10, 2)->unsigned()->notNull()->defaultValue(0.00)->comment('出售价'),
            'market_price' => $this->decimal(10, 2)->unsigned()->notNull()->defaultValue(0.00)->comment('市场价'),
            'inventory' => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('库存'),
            'created_at' => $this->datetime()->comment('创建时间'),
            'updated_at' => $this->datetime()->comment('更新时间'),
            'operated_at' => $this->datetime()->comment('操作时间'),
            'status' => $this->tinyInteger()->unsigned()->notNull()->defaultValue(1)->comment('状态'),
            'is_delete' => $this->boolean()->notNull()->defaultValue(false)->comment('是否删除'),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dawn_goods}}');
    }
}
