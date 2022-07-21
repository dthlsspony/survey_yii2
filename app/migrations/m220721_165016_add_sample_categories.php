<?php

use yii\db\Migration;

/**
 * Class m220721_165016_add_sample_categories
 */
class m220721_165016_add_sample_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $cat1 = new \app\models\SurveyCategory();
        $cat1->title = 'Качество образования';
        $cat1->on_main = 1;
        $cat1->save();

        $cat2 = new \app\models\SurveyCategory();
        $cat2->title = 'Качество общежитий';
        $cat2->on_main = 0;
        $cat2->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220721_165016_add_sample_categories cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_165016_add_sample_categories cannot be reverted.\n";

        return false;
    }
    */
}
