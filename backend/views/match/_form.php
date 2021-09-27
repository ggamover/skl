<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\widgets\ActiveForm */

$teamsList =
    \yii\helpers\ArrayHelper::map(\common\models\Team::find()->select(['id', 'name'])->all(), 'id', 'name');
?>

<div class="match-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day')
        ->label('Дата')
        ->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM-dd']) ?>
    <?= $form->field($model, 'time')
        ->label('Время')
        ->textInput()->input('text', ['placeholder' => '00:00']) ?>

    <div class="row">
      <div class="col-md-2">Хозяева</div>
      <div class="col-md-6">
          <?= Html::activeDropDownList($model, 'homeTeam', $teamsList, [
              'prompt' => 'Выбрать',
              'class' => 'form-control'
          ]) ?>
      </div>
      <div class="col-md-2 text-right">Голы</div>
      <div class="col-md-2">
          <?= Html::activeTextInput($model, 'homeScore', ['class' => 'form-control']); ?>
      </div>
    </div>
  <hr>
    <div class="row">
      <div class="col-md-2">Гости</div>
      <div class="col-md-6">
          <?= Html::activeDropDownList($model, 'guestTeam', $teamsList, [
              'prompt' => 'Выбрать',
              'class' => 'form-control'
          ]) ?>
      </div>
      <div class="col-md-2 text-right">Голы</div>
      <div class="col-md-2">
          <?= Html::activeTextInput($model, 'guestScore', ['class' => 'form-control']); ?>
      </div>
    </div>

   <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


  <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
