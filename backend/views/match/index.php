<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Матчи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый матч', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'note:ntext',
            'home_team',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
