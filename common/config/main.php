<?php
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
];
