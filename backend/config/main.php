<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
            // 'redactor' => 'yii\redactor\RedactorModule',
            // 'categories' => [
            //     'class' => 'yiimodules\categories\Module',
            // ],
        ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'yii.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => false,
        //     'authTimeout' => 60,
        // ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'authTimeout' => 600,// 10 minutes
            'on beforeLogout' => function ($event) {
                // last Login
                 $user=common\models\User::findByUsername(Yii::$app->user->identity->username);
                 $user->lastLogout=time();
                 if(!empty($_GET['r']) && $_GET['r']=='site/logout'){
                    $user->forceLogout= 0;
                 }
                 else{
                    $user->forceLogout= 1;
                 }

                 $user->save();

            },
        ],
        'session' => [
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
        'assetManager'=>[
            'class' => 'yii\web\AssetManager',
            'forceCopy' => true, 
        ]
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as beforeRequest' =>[
        'class' => 'backend\components\changeLanguage'
    ],
    'params' => $params,
];
