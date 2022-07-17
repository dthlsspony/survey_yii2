<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%survey_category}}`.
 */
class m220717_162921_create_survey_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%survey_category}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%survey_category}}');
    }
}
