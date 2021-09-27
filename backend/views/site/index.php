<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Турнирная таблица</h1>

        <p class="lead">Проверочное приложение для ООО «СКЛ», разработано Дмитрием Евдокимовым</p>

        <p><a class="btn btn-lg btn-success" href="#">gamover.ru</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 offset-lg-2">
                <h2>Команды</h2>

                <p>Просмотр и изменение списка команд, участвующих в турнире</p>

                <p><a class="btn btn-outline-secondary"
                      href="<?= \yii\helpers\Url::to(['team/index']); ?>">Открыть &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Матчи</h2>

                <p>Ввод и изменение результатов игр</p>

              <p><a class="btn btn-outline-secondary"
                    href="<?= \yii\helpers\Url::to(['match/index']); ?>">Открыть &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
