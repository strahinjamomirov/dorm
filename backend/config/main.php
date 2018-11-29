<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules'             => [
        'user'     => [
            'class'                  => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'enableConfirmation'     => false,
            'enableRegistration'     => false,
            'confirmWithin'          => 21600,
            'cost'                   => 12,
            'admins'                 => ['admin'],
            'controllerMap'          => [
                'security' => 'backend\controllers\LoginController',
            ]
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
        'rbac'     => [
            'class' => 'dektrium\rbac\RbacWebModule',
        ],
    ],
    'components' => [
        'user'    => [
            // 'identityClass'   => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            //'class' => '\intelligence\components\User',
            'identityClass'   => 'backend\models\User', // User must implement the IdentityInterface
            //'loginUrl'=>['/user/security/login']
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        'session'      => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view'         => [
            'class' => \common\components\View::class,
            'theme' => [
                'pathMap' => [
                    '@vendor/dektrium/yii2-user/views/' => '@backend/views/user/',
                    '@vendor/dektrium/yii2-rbac/views/' => '@backend/views/user/',
                ],
            ],
        ],
    ],
    'params' => $params,
];
