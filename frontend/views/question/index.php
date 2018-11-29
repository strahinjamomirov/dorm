<?php

use common\components\Box;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista pitanja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-dorm-index" style="overflow:auto; overflow-y: hidden; height: 100%;">
            <?php Box::begin([
                'encodeLabel' => false,
                'collapsable' => false
            ]); ?>
            <?php Pjax::begin(); ?>

            <p>
                <?= Html::a('Kreiraj pitanje', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    [
                        'attribute' => 'fb_link',
                        'label'     => 'Link ka Facebook nalogu',
                        'value'     => function ($model) {
                            return Html::encode($model->fb_link);
                        }
                    ],

                    [
                        'attribute' => 'question',
                        'label'     => 'Pitanje',
                        'value'     => function ($model) {
                            return Html::encode($model->question);
                        }
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>

            <?php Box::end() ?>
        </div>

