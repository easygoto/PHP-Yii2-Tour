<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190819_134208_create_dawn_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
        `status` int(11) DEFAULT NULL COMMENT '状态',
        `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
         */
        $this->createTable('{{%dawn_user}}', [
            'id' => $this->primaryKey()->unsigned(),
            'user_name' => $this->string(50)->notNull()->defaultValue('')->comment('用户名'),
            'secret_code' => $this->string(50)->notNull()->defaultValue('')->comment('密码'),
            'real_name' => $this->string(50)->notNull()->defaultValue('')->comment('真实姓名'),
            'mobile_number' => $this->string(50)->notNull()->defaultValue('')->comment('手机号码'),
            'gender' => $this->tinyInteger()->notNull()->defaultValue(-1)->comment('性别'),
            'created_at' => $this->dateTime()->comment('创建时间'),
            'updated_at' => $this->dateTime()->comment('更新信息时间'),
            'operated_at' => $this->dateTime()->comment('操作时间'),
            'last_login_at' => $this->dateTime()->comment('最后一次登录时间'),
            'status' => $this->integer()->notNull()->defaultValue(1)->comment('状态'),
            'is_delete' => $this->boolean()->notNull()->defaultValue(false)->comment('是否删除'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dawn_user}}');
    }
}
