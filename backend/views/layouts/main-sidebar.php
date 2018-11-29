<?php
/**
 * @author  Agiel K. Saputra <13nightevil@gmail.com>
 */

use codezeen\yii2\adminlte\widgets\Menu;

$adminSiteMenu[0] = [
    'label' => 'Dashboard',
    'icon'  => 'fa fa-dashboard',
    'url'   => ['/site/index'],
    'visible' => !Yii::$app->user->isGuest
];
$adminSiteMenu[1] = [
    'label' => 'Change Dorm',
    'icon'  => 'fa fa-user-secret',
    'url'   => ['/changing-dorm/index'],
    'visible' => !Yii::$app->user->isGuest
];

$adminSiteMenu[2] = [
    'label' => 'Questions',
    'icon'  => 'fa fa-comment',
    'url'   => ['/question/index'],
    'visible' => !Yii::$app->user->isGuest
];

$adminSiteMenu[3] = [
    'label' => 'Dorms',
    'icon'  => 'fa fa-user',
    'url'   => ['/dorm/index'],
    'visible' => !Yii::$app->user->isGuest
];
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <?= Menu::widget([
            'items' => $adminSiteMenu,
        ])
        ?>

    </section>
</aside>
