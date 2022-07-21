<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m220719_182519_add_admin_user
 */
class m220719_182519_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        (new User([
            'username' => 'admin',
            'password' => \Yii::$app->security->generatePasswordHash('admin'),
            'fio' => 'Админ',
            'email' => 'admin@example.com',
            'roles' => '0'
            ]))->save(false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220719_182519_add_admin_user cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220719_182519_add_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
