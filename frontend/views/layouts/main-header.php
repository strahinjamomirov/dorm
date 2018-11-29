<?php
/**
 * @author  Agiel K. Saputra <13nightevil@gmail.com>
 */

use cebe\gravatar\Gravatar;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<header class="main-header">
    <a href="<?= Url::base(true) ?>" class="logo">
        <span class="logo-mini"><b>C</b>SR</span>
        <span class="logo-lg"><?= Yii::$app->name ?></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <?php if (!Yii::$app->user->isGuest): ?>
                    <li class="dropdown user user-menu">
                        <div class="pull-right">
                            <?= Html::a(
                                Yii::t('app', 'Izlogujte se'),
                                ['/site/logout'],
                                ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']
                            ) ?>

                        </div>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </nav>
</header>

<style>
    @media (max-width: 767px) {

        .skin-blue .main-header .navbar .dropdown-menu li a {
            color: #666 !important;
        }
    }
</style>