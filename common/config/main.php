<?php
use kartik\datecontrol\Module;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'cs-CZ',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	    'assetManager' => [
		    'class' => 'yii\web\AssetManager',
		    'appendTimestamp' => true
	    ],
        'formatter' => [
	        'dateFormat' => 'dd.MM.yyyy',
	        'timeFormat' => 'HH:mm',
	        'datetimeFormat' => 'dd.MM.yyyy HH:mm:ss',
	        'defaultTimeZone' => 'Europe/Prague',
	        'decimalSeparator' => ',',
	        'thousandSeparator' => ' ',
	        'currencyCode' => 'CZK',
        ],
        'authManager' => 'common\components\RbacManager',
	    'mailer' => 'common\components\Mailer'
    ],
	'modules' =>[
		'datecontrol' =>  [
			'class' => 'kartik\datecontrol\Module',

			// format settings for displaying each date attribute (ICU format example)
			'displaySettings' => [
				Module::FORMAT_DATE => 'dd.MM.yyyy',
				Module::FORMAT_TIME => 'HH:mm',
				Module::FORMAT_DATETIME => 'dd.MM.yyyy HH:mm:ss',
			],

			// format settings for saving each date attribute (PHP format example)
			'saveSettings' => [
				Module::FORMAT_DATE => 'php:Y-m-d',
				Module::FORMAT_TIME => 'php:H:i:s',
				Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
			],

			// set your display timezone
			'displayTimezone' => 'Europe/Prague',

			// set your timezone for date saved to db
			'saveTimezone' => 'Europe/Prague',

			// automatically use kartik\widgets for each of the above formats
			'autoWidget' => true,

			// default settings for each widget from kartik\widgets used when autoWidget is true
			'autoWidgetSettings' => [
				Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]],
				Module::FORMAT_DATETIME => [],
				Module::FORMAT_TIME => ['pluginOptions' => ['defaultTime' => false]]
			]
		]
	]
];
