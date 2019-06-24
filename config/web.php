<?php

$params = require __DIR__ . '/params.php';
if (RESTFUL_API_ENABLE) {
    $rules = require_once __DIR__ . '/route.php';
} else {
    $rules = [
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
        '<module:\w+>/<category:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<category>/<controller>/<action>',
    ];
}

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'defaultRoute' => 'site/index',
//    'catchAll' => ['site/index'], // 所有的页面都会跳到此动作
    'layout' => 'main',
    'components' => [
        'hello' => [
            'class' => 'app\components\HelloComponent',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'study_yii',
            'enableCookieValidation' => ! RESTFUL_API_ENABLE,
            'enableCsrfValidation' => ! RESTFUL_API_ENABLE,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            /*'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ],*/
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'redis' => require __DIR__ . '/redis.php',
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => RESTFUL_API_ENABLE, // 若开启，路由和真实的接口前面不可相同
            'showScriptName' => RESTFUL_API_ENABLE,
            'rules' => $rules,
        ],
    ],
    'params' => $params,
    'modules' => [
        'dawn' => [
            'class' => 'app\modules\dawn\Module',
        ],
        'gen' => [
            'class' => 'app\modules\gen\Module',
        ],
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '172.18.0.1', '::1'],
    ];

    $config['modules']['gen'] = [
        'class' => 'app\modules\gen\Module',
    ];
}

return $config;
