<?php

/* @var $this yii\web\View */
/**
* @var array $table
 */

$this->title = 'Турнирная таблица';
?>
<div class="site-index">

  <div class="jumbotron text-center bg-transparent">
    <h1 class="display-4"><?= $this->title ?></h1>

    <p class="lead">Проверочное приложение для ООО «СКЛ», разработано Дмитрием Евдокимовым</p>

    <p><a class="btn btn-lg btn-outline-primary" href="#">gamover.ru</a></p>
  </div>

    <div class="body-content">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Команда</th>
              <th width="1">И</th>
              <th width="1">ГЗ</th>
              <th width="1">ГП</th>
              <th width="1">О</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($table as $row):?>
            <tr>
              <td><?= $row['name'] ?></td>
              <td><?= $row['games'] ?></td>
              <td><?= $row['scored'] ?></td>
              <td><?= $row['conceded'] ?></td>
              <td class="text-primary font-weight-bold"><?= $row['points'] ?></td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-12 text-muted">
          <small>И - количество игр, ГЗ - голов забито, ГП - голов пропущено, О - очков</small>
        </div>
      </div>

    </div>
</div>
