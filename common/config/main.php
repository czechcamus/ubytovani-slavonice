<?php
use kartik\datecontrol\Module;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'cs-CZ',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
	        'dateFormat' => 'dd.MM.yyyy',
	        'timeFormat' => 'HH:mm',
	        'defaultTimeZone' => 'Europe/Prague',
	        'decimalSeparator' => ',',
	        'thousandSeparator' => ' ',
	        'currencyCode' => 'CZK',
        ]
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
				Module::FORMAT_TIME => [],
			],

			// custom widget settings that will be used to render the date input instead of kartik\widgets,
			// this will be used when autoWidget is set to false at module or widget level.
			'widgetSettings' => [
				Module::FORMAT_DATE => [
					'class' => 'yii\jui\DatePicker',
					'options' => [
						'dateFormat' => 'php:d.M.Y',
						'options' => ['class' => 'form-control'],
					]
				]
			]
		]
	]
];
