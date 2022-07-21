<?php

use yii\db\Migration;

/**
 * Class m220721_164440_update_survey_category_table
 */
class m220721_164440_update_survey_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('survey_category', 'title', $this->string(100));
        $this->addColumn('survey_category', 'on_main', $this->smallInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220721_164440_update_survey_category_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_164440_update_survey_category_table cannot be reverted.\n";

        return false;
    }
    */
}
