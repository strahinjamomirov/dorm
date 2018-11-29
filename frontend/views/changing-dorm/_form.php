<?php

use common\components\Box;
use common\components\OptionsHelper;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ChangingDorm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="changing-dorm-form">
    <?php Box::begin([
        'encodeLabel' => false,
        'collapsable' => false
    ]); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gender')->dropDownList(OptionsHelper::getBooleanList())->label('Pol') ?>

    <?= $form->field($model, 'fb_link')->textInput(['maxlength' => true])->label('Link ka Facebook-u') ?>

    <?= $form->field($model, 'changing_from')->widget(Select2::className(), [
        'data'          => OptionsHelper::getDorms(),
        'options'       => ['placeholder' => 'Izaberite dom'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label('Iz doma'); ?>

    <?= $form->field($model, 'changing_to')->widget(Select2::className(), [
        'data'          => OptionsHelper::getDorms(),
        'options'       => ['placeholder' => 'Izaberite dom'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label('U dom'); ?>

    <?= $form->field($model, 'category')->dropDownList(OptionsHelper::getCategories())->label('Kategorija') ?>

    <?= $form->field($model, 'number_of_beds')->dropDownList(OptionsHelper::getNumberOfBeds())->label('Broj Kreveta') ?>

    <div class="form-group">
        <?= Html::submitButton('Sacuvajte zahtev', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Box::end() ?>
</div>
