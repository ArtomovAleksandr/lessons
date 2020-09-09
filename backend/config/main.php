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
    'modules' => [],
    'components' => [
    //    'homeUrl' =>'/admin',
        'request' => [
            'csrfParam' => '_csrf-backend',
       //     'baseUrl' =>'/admin',
            'csrfCookie' => [
            'httpOnly' => true,
            'path' => '/admin',
           ],
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'path' => '/admin',
                'httpOnly' => true,
            ],
        ],



//        'user' => [
//            'identityCookie' => [
//                'name' => '_backendIdentity',
//                'path' => '/admin',
//                'httpOnly' => true,
//            ],
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            'rules' => [
    //            '/' => 'goods/index',

            ],

        ],
  //      'session' => [
            // this is the name of the session cookie used for login on the backend
//            'name' => 'advanced-backend'
//            'name' => 'BACKENDSESSID',
//            'cookieParams' => [
//                'path' => '/admin',
//            ],

 //       ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'cookieParams' => [
                'path' => '/admin',
            ],
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



    ],
    'params' => $params,
];
