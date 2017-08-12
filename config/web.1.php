<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout'=>'column2',
    'layoutPath'=>'@app/themes/adminLTE/layouts',
    'components' => [
     

     'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''=>'home',
              //'nurseservice/index'=>'nurseservice/index',
              'nurseservice/patientsearch'=>'nurseservice/patientsearch',
              //'nurseservice/update'=>'nurseservice/update',
            
                
                //''=>'patient/index',
                '<action:(index|login|logout)>'=>'home/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
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
             'enableAutoLogin' => true,
        
           
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
        'session' => [
            'name' => 'PHPBACKSESSID',
            'savePath' => __DIR__ . '/../runtime',
        ],
    

        
        
        
       
        'db' => require(__DIR__ . '/db.php'),
    ],
   /* 'params' => $params,
    'aliases' => [
        '@mdm/admin' => '@app/vendor/mdmsoft/yii2-admin',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
'modules' => [
       'admin' => [
        
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User', 
                    'idField' => 'id',
                    'usernameField' => 'username',
                    'fullnameField' => 'u_name',
                    'extraColumns' => [
                        [
                            'attribute' => 'u_name',
                            'label' => 'Full Name',
                            'value' => function($model, $key, $index, $column) {
                                return $model->g->full_name;
                            },
                        ],
                       
                    ],
                    'searchClass' => 'app\models\UserSearch'
                ],
            ],
            
        ]
	],
        
        'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'home/*',
            'admin/*',
            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ], */

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