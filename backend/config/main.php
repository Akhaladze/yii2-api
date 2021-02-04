<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
	'name'=> 'Space W@rriors [Control Pannel]',
	'basePath' => dirname(__DIR__),
	'controllerNamespace' => 'backend\controllers',
	'bootstrap' => ['log'],
	'modules' => [
	 
        'blog' => [
            'class' => 'akiraz2\blog\Module',
            'controllerNamespace' => 'akiraz2\blog\controllers\backend',
            //'adminAccessControl' => 'common\components\AdminAccessControl', // null - by default
			
           // 'urlManager' => 'urlManagerFrontend',// 'urlManager' by default
    	    'imgFilePath' => '/var/www.beegee/practical-a/frontend/web/img/blog',
           // 'imgFileUrl' => '/img/blog/',                   
            'imgFileUrl' => '/img/blog',                   
        
			//'redactorModule' => 'redactor' // 'redactorBlog' - default, maybe you want use standard module 'redactor' with own config
			'redactorModule' => 'redactorBlog' // 'redactorBlog' - default, maybe you want use standard module 'redactor' with own config
			
        ],
		
		'redactorBlog' => [
				'class' => 'yii\redactor\RedactorModule',
				'uploadDir' => '@frontend/web/img/upload/',
				'uploadUrl' => $params['frontendHost'] . '/img/upload',
			//	'uploadUrl' => 'https://space-warriors.com/frontend/web/img/upload',
				'imageAllowExtensions' => ['jpg', 'png', 'gif', 'svg']	
			],
		],
		
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'practical-a-backend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
		'googleApi' =>
        [
            'class'       => '\skeeks\yii2\googleApi\GoogleApi',
            'key'         => 'AIzaSyBq1YfLSNQOoQXyw8TYEPzR9JrxG00U7VA',
        ],
    ],
    'params' => $params,
];





















