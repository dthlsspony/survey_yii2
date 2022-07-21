
<div class="container">
    <h2>Пользователи</h2>
    <div class="row border-bottom border-danger">
        <div class="col-6">
            ФИО
        </div>
        <div class="col-5">
            Роли
        </div>
        <div class="col-1">

        </div>
    </div>
<?php use app\models\User;

foreach ($users as $user) : ?>
    <div class="row pt-2 pb-2 border-bottom">
        <div class="col-6">
            <?=$user->fio?>
        </div>
        <div class="col-5">
            <?php foreach (explode(',', $user->roles) as $role) : ?>
                <span><?=User::$rolesList[(int)$role]?></span>
            <?php endforeach; ?>
        </div>
        <div class="col-1">
            <a href="/admin/user/update/?id=<?=$user->id?>">R</a>
        </div>
    </div>
<?php endforeach; ?>
<div class="row mt-3">
    <a class="btn btn-danger" href="/admin/user/create">Создать пользователя</a>
</div>
</div>
