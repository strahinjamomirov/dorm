<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Registracija';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Registrujte se</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'Email']) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Lozinka']) ?>

        <div class="row">
            <div class="col-xs-12">
                <?= Html::submitButton('Registrujte se', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'register-button']) ?>
                <?= Html::a('Ulogujte se', Url::to(['site/login']), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>

            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
