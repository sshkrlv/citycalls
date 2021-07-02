<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lqSvr30vXtCcCcgt-jurEaQbN0l_I_lr',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'db' => $db,
/*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],*/
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'call'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'customer'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'review'],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['smi' => 'smi'],],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'scope'],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['types'=>'TypeOfProblem']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'technology'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/call'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/customer'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/review'],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['smi' => 'api/smi'],],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/scope'],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['types'=>'api/TypeOfProblem']],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/technology'],
            ],
        ],
    ],

    'params' => $params,
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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
