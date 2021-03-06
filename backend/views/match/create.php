<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Match */

$this->title = 'Новый матч';
$this->params['breadcrumbs'][] = ['label' => 'Матчи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
