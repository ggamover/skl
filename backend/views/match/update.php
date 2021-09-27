<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Match */
$teamstr = implode(' - ', $model->teamsByHome());
$this->title = 'Изменить матч: ' . $teamstr;
$this->params['breadcrumbs'][] = ['label' => 'Матчи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $teamstr, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="match-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
