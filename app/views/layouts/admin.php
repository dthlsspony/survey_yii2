<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$cats = \app\models\SurveyCategory::findAll(['on_main' => 1]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <div class="navbar nav bg-danger text-white">
        <div class="logo font-weight-bolder align-self-start"><h2>Опросы</h2></div>
        <div class="align-self-end align-items-baseline d-flex">
            <h2 class="mr-3"><?=\Yii::$app->user->identity?\Yii::$app->user->identity->username:''?></h2>
            <h2>E</h2>
        </div>
    </div>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid d-flex">
        <div class="col-2 flex-column vh-100">
            <h5>Активные опросы</h5>
            <ul class="list-unstyled ml-4">
                <?php foreach ($cats as $cat) : ?>
                <li class="item <?=\Yii::$app->request->url == '/admin/running-survey' ? 'active' : '' ?>"><a href="/admin/running-survey?id=<?=$cat->id?>"><?=$cat->title?></a></li>
                <?php endforeach; ?>
                <li class="item <?=\Yii::$app->request->url == '/admin/running-survey' ? 'active' : '' ?>"><a href="/admin/running-survey">Другие опросы</a></li>
            </ul>
            <h5>Администрирование</h5>
            <ul class="list-unstyled ml-4">
                <li class="item <?=str_starts_with(\Yii::$app->request->url, '/admin/survey') ? 'active' : '' ?>"><a href="/admin/survey">Опросы</a></li>
                <li class="item <?=str_starts_with(\Yii::$app->request->url, '/admin/user') ? 'active' : '' ?>"><a href="/admin/users">Пользователи</a></li>
            </ul>
        </div>
        <div class="col-10">
            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Главная',
                    'url' => '/admin/dashboard'
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
