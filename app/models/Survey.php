<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $category_id
 * @property string|null $year
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $admin
 *
 * @property SurveyOperator[] $surveyOperators
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'admin'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['year'], 'string', 'max' => 100],
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
            'category_id' => 'Category ID',
            'year' => 'Year',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'admin' => 'Admin',
        ];
    }

    /**
     * Gets query for [[SurveyOperators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperators()
    {

        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('survey_operator', ['survey_id' => 'id', ]);
    }

    public function beforeSave($insert)
    {
        if ($this->operators) {
            foreach ($this->operators as $operator_id) {
                // Сохраняем всех в таблицу

            }
        }
        return parent::beforeSave($insert);
    }
}
