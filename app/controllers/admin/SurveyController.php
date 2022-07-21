<?php

namespace app\controllers\admin;

class SurveyController extends \yii\web\Controller
{
    public $layout='admin';

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionView($id)
    {

    }

}
