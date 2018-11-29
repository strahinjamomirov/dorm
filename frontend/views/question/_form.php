<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fb_link')->textInput(['maxlength' => true])->label('Link ka Facebook-u') ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6])->label('Pitanje') ?>

    <div class="form-group">
        <?= Html::submitButton('Sacuvajte pitanje', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
