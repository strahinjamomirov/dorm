<?php

/* @var $this yii\web\View */

use common\components\Box;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Stop Tackanju';
?>
<div class="site-index">

    <?php Box::begin([
        'encodeLabel' => false,
        'collapsable' => false
    ]); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <?= Html::a('Menjanje domova', Url::to(['changing-dorm/index']), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>
        <div class="col-xs-12 col-sm-6">
            <?= Html::a('Pitanja', Url::to(['question/index']), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>
    </div>

    <?php
    Box::end();
    ?>

</div>
