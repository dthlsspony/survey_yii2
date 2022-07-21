<?php

namespace app\controllers\admin;

use app\models\User;
use yii\web\ForbiddenHttpException;

class DefaultController extends \yii\web\Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $this->layout = 'main';
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $userdata = $request->post('User');
            $user = User::findByUsername($userdata['username']);
            if (!$user || !$user->validatePassword($userdata['password'])) {
                throw new ForbiddenHttpException('Wrong credentials');
            }
            // User validated
            \Yii::$app->user->login($user, 30);
            $this->redirect('/admin/dashboard');
        }

        return $this->render('index', [
            'model' => new User()
        ]);
    }

    public function actionDashboard()
    {
        return $this->render('dashboard', [
            'user' => \Yii::$app->user,
        ]);
    }

    public function actionUsers()
    {
        return $this->render('users', [
            'users' => User::find()->all()
        ]);
    }

    public function actionRunningSurveys()
    {
        return $this->render('running_survey', [
            'model' => new User()
        ]);
    }

    public function actionSurveys()
    {
        return $this->render('surveys', [
            'model' => new User()
        ]);
    }
}
