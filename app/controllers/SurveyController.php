<?php

namespace app\controllers;

class SurveyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
