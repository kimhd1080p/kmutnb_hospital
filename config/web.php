<?php

$params = require(__DIR__ . '/params.php');

$config = [

    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@mdm/admin' => '@app/vendor/mdmsoft/yii2-admin',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
    'layout'=>'column2',
    'layoutPath'=>'@app/themes/adminLTE/layouts',
    
    'components' => [

     'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // ''=>'home/index',
                // 'home/login'=>'home/login',
                // '<action:(index|login|logout)>'=>'site/<action>',
                // '<controller:\w+>/<id:\d+>' => '<controller>/view',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],

         'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/themes/adminLTE'],
                'baseUrl' => '@web/../themes/adminLTE',
            ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'n0VkMX1RmIa_ovJmwR3Gn_hdZyQ7SyKe',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            //'enableAutoLogin' => true,
            //'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['home/login'],
            
        ],
        'errorHandler' => [
            'errorAction' => 'home/error',
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
  'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
],
        
        

    ],
    'params' => $params,

    'modules' => [
       'admin' => [
     'class' => 'mdm\admin\Module',
      'layout' => 'left-menu', // it can be '@path/to/your/layout'.
        'controllerMap' => [
            'assignment' => [
                'class' => 'mdm\admin\controllers\AssignmentController',
                //'userClassName' => 'app\models\User',
                'idField' => 'id',
                'usernameField' => 'username',
            ],
            'other' => [
                'class' => 'path\to\OtherController', // add another controller
            ],
        ],
        'menus' => [
            'assignment' => [
                'label' => 'Grand Access' // change label
            ],
            'route' => null, // disable menu route
        ]
            
        ]
	],
     'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'home/*',
            'nurseservice/*',
            'admin/*',
            'debug/*',
            'gii/*',
            'casepatient/*',

            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
     
   
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    //$config['modules']['gii'] = 'yii\gii\Module';
    $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            'generators' => [ //here
                'crud' => [ // generator name
                    'class' => 'yii\gii\generators\crud\Generator', // generator class
                    'templates' => [ //setting for out templates
                        'custom' => '@vendor/bmsrox/yii-adminlte-crud-template', // template name => path to template
                    ]
                ]
            ],
        ];
}

return $config;