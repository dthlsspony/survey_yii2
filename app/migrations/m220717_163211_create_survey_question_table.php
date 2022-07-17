<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%survey_question}}`.
 */
class m220717_163211_create_survey_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%survey_question}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%survey_question}}');
    }
}
