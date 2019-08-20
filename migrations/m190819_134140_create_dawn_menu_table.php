<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m190819_134140_create_dawn_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dawn_menu}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'pid' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('父级菜单id'),
            'sn' => $this->string(50)->notNull()->defaultValue('')->comment('编号'),
            'name' => $this->string(50)->notNull()->defaultValue('')->comment('名称'),
            'url' => $this->string(200)->notNull()->defaultValue('')->comment('网址'),
            'sort' => $this->smallInteger()->unsigned()->notNull()->defaultValue(0)->comment('排序'),
            'icon' => $this->string(50)->notNull()->defaultValue('')->comment('图标'),
            'status' => $this->tinyInteger()->unsigned()->notNull()->defaultValue(1)->comment('状态(1启用, 0禁用)'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dawn_menu}}');
    }
}
