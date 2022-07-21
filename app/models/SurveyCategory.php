<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey_category".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $on_main
 */
class SurveyCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['on_main'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'on_main' => 'On Main',
        ];
    }
}
