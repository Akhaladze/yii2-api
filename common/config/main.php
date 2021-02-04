<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	
'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'timeZone' => 'Europe/Kiev', //time zone affect the formatter datetime format
    
	'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

		'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			
        ],
		
        
		 
    

        'formatter' => [ //for the showing of date datetime
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
            'currencyCode' => 'USD',
        ],


	],

    
];


           