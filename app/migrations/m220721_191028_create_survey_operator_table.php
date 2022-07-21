<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%survey_operator}}`.
 */
class m220721_191028_create_survey_operator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%survey_operator}}', [
            'survey_id' => $this->integer(),
            'operator_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk_operator', 'survey_operator', 'operator_id', 'users', 'id');
        $this->addForeignKey('fk_survey', 'survey_operator', 'survey_id', 'survey', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%survey_operator}}');
    }
}
