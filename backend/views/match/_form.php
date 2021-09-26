<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day')
        ->label('Дата')
        ->widget(\yii\jui\DatePicker::class) ?>
    <?= $form->field($model, 'home_team')
        ->label('Время')
        ->textInput() ?>

    <?= $form->field($model, 'home_team')
        ->dropDownList(
            array_merge(['' => 'Выбрать'],
            \yii\helpers\ArrayHelper::map(\common\models\Team::find()->all(), 'id', 'name'))
        ) ?>

   <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


  <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
