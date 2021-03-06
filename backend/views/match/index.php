<?php

use yii\helpers\ArrayHelper;
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
            [
                'attribute' => 'date',
                'header' => 'Дата',
                'format' => ['date', 'php:Y-m-d H:i'],
                'enableSorting' => true,
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute'=>'date',
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                ])
            ],
            [
                'header' => 'Участники',
                'value' => function($model) {
                    /**
                     * @var \backend\models\Match $model
                     */
                    return implode('-', $model->teamsByHome());
                }
            ],
            [
                'attribute' => 'teams',
                'header' => 'Счёт',
                'value' => function($model) {
                    /**
                     * @var \backend\models\Match $model
                     */
                    return implode(' : ', $model->scoreByHome());
                }
            ],
            'note:ntext',
            'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
