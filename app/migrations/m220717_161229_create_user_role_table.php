<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_role}}`.
 */
class m220717_161229_create_user_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_role}}', [
            'user_id' => $this->integer(),
            'role_id' => $this->integer()
        ]);
        $this->addForeignKey('user_id_user_role', 'users', 'id', 'user_role', 'user_id');
        $this->addForeignKey('role_id_user_role', 'roles', 'id', 'roles', 'role_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_role}}');
    }
}
