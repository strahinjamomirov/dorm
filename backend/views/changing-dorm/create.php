<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ChangingDorm */

$this->title = 'Create Changing Dorm';
$this->params['breadcrumbs'][] = ['label' => 'Changing Dorms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="changing-dorm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
