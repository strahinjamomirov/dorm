<?php

use common\components\Box;
use common\components\OptionsHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista zahteva';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="changing-dorm-index">
    <div class="row">
        <div class="col-xs-12">
            <?php Box::begin([
                'encodeLabel' => false,
                'collapsable' => false
            ]); ?>
            <?php Pjax::begin(); ?>

            <p>
                <?= Html::a('Kreiraj zahtev', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    [
                        'attribute' => 'gender',
                        'label'     => 'Pol',
                        'value'     => function ($model) {
                            /** @var \common\models\ChangingDorm $model */
                            if ($model->gender) {
                                return 'Muski';
                            }
                            return 'Zenski';
                        },
                        'filter'    => OptionsHelper::getBooleanList(),
                    ],
                    [
                        'attribute' => 'fb_link',
                        'label'     => 'Link ka Facebook nalogu',
                        'value'     => function ($model) {
                            return Html::encode($model->fb_link);
                        }
                    ],
                    [
                        'attribute' => 'changing_from',
                        'label'     => 'Iz doma',
                        'value'     => function ($model) {
                            /** @var \common\models\ChangingDorm $model */
                            return $model->changingFrom->name;
                        },
                        'filter'    => OptionsHelper::getDorms(),
                    ],
                    [
                        'attribute' => 'changing_to',
                        'label'     => 'Trazeni(U) dom',
                        'value'     => function ($model) {
                            /** @var \common\models\ChangingDorm $model */
                            return $model->changingTo->name;
                        },
                        'filter'    => OptionsHelper::getDorms(),
                    ],
                    [
                        'attribute' => 'category',
                        'label'     => 'Kategorija',
                        'filter'    => OptionsHelper::getCategories(),
                    ],
                    [
                        'attribute' => 'number_of_beds',
                        'label'     => 'Broj Kreveta',
                        'filter'    => OptionsHelper::getNumberOfBeds(),
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>

            <?php Box::end() ?>
        </div>
    </div>

</div>
