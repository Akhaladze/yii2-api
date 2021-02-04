<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name'=> 'Space Warriors',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
   // 'defaultRoute' => '/blog', 

  'modules' => [
		
		 'v1' => [
            
            'basePath' => '@api/modules/v1',
            'class' => 'api\modules\v1\Module'  
          
		],
	
		
        'blog' => [
            'class' => 'akiraz2\blog\Module',
            'defaultRoute' => '/blogold', 
            'controllerNamespace' => 'akiraz2\blog\controllers\frontend',
            'blogPostPageCount' => 12,
            'blogCommentPageCount' => 10, //20 by default
            'enableComments' => true, 
            'schemaOrg' => [ 
                'publisher' => [
                    'logo' => 'https://space-warriors.com/logo.jpg',
                    'name' => 'Space Warriors',
                    'phone' => '+38 050 446 86 18',
                    'address' => 'Astana, Kazahstan' 
                    ],
                ],
                    'imgFilePath' => '/var/www.beegee/practical-a/frontend/web/img/blog',
                    'imgFileUrl' => '/frontend/web/img/blog'
               ],
			   
        ],   
             

 'components' => [
        
        'urlManager' => [
			'BaseUrl' 				=>	'/',
			'enablePrettyUrl' 		=>	true,
			'enableStrictParsing'	=>	false,
			'showScriptName' 		=>	false,
		
		'rules' => [
                
				'' 									=> 	'site/category',
				'/'									=> 	'site/category',
                '/about' 							=> 	'site/about',
                '/login' 							=> 	'site/login',
                '/logout' 							=> 	'site/logout',
                '/codex' 							=> 	'site/codex',
                '/contact' 							=> 	'site/contact',
                '/test' 							=> 	'yawebmaster/test',

				'/blog' 							=>	'site/category',
                '/blog/<id:\d+>-<slug>' 			=>	'site/category',
				'/blog/default/view'				=>	'site/category',
                						                
                '/<cat1>' 							=>	'site/category',
				'/<cat1>/<id:\d+>-<slug>'			=>	'site/category',
				
				'/<cat1>/<cat2>'					=>	'site/category',
				'/<cat1>/<cat2>/<id:\d+>-<slug>'	=>	'site/category'
				
                
		

					],

        ],
            
  'request' => [
            'csrfParam' => '_csrf-backend',
			'BaseUrl' => '/',
			'parsers' => ['application/json' => 'yii\web\JsonParser',],
				],

       
 'view' => [
		'theme' => [
			'pathMap' => [
			'@akiraz2/yii2-blog/views/frontend/default' => '@frontend/views/site'
			],
		],
  ],
				
'YandexTurboPages'	=>	[  			
            'class' => 'YandexTurboPages',
	],
		
	'authClientCollection' => [
                    'class' => 'yii\authclient\Collection',
                    'clients' => [
                        'linkedin' => [
                            'class' => 'yii\authclient\clients\LinkedIn',
                            'clientId' => '77fsbe7bij21j1',
                            'clientSecret' => '96dVUXfJaeTl6OdI',
                ],
            ],
        ],
        
        /*
        'response' => [
            'formatters' => [
                'php' => 'app\components\PhpArrayFormatter',
            ],
        ],
        */ 

        'user' => [
            
			'identityClass' => 'common\models\User',
            
			'enableAutoLogin' => true,
            
			'identityCookie' => ['name' 	=> '_identity-frontend', 
                                 'httpOnly' => true],
	],
        
        'session' => [
          // this is the name of the session cookie used for login on the frontend
            'name' => 'practical-a-frontend',
        ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 3,
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
		
 
		
	'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                'js'=>[]
                 ],
        
                'yii\bootstrap\BootstrapAsset' => [
                'css' => [],
                ],
            ],
        ],	
		
    ],
	
    'params' => $params
];