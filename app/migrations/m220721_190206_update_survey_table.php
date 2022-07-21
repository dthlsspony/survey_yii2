<?php

use yii\db\Migration;

/**
 * Class m220721_190206_update_survey_table
 */
class m220721_190206_update_survey_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('survey', 'year', $this->string(100));
        $this->addColumn('survey', 'start_date', $this->date()->null());
        $this->addColumn('survey', 'end_date', $this->date()->null());
        $this->addColumn('survey', 'admin', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220721_190206_update_survey_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_190206_update_survey_table cannot be reverted.\n";

        return false;
    }
    */
}
