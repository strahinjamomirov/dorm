<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ChangingDorm */

$this->title = 'Update Changing Dorm: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Changing Dorms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="changing-dorm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
