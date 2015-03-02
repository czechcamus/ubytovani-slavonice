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
    'name' => 'Správa ubytování ve Slavonicích',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'i18n' => [
            'translations' => [
                'back*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'back' => 'back.php',
                        'back/error' => 'error.php',
                    ],
                ],
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
	        'enablePrettyUrl' => true,
	        'showScriptName' => false
        ]
    ],
    'controllerMap' => [
	    'room-type' => 'backend\controllers\type\RoomTypeController',
	    'place-type' => 'backend\controllers\type\PlaceTypeController',
	    'phone-type' => 'backend\controllers\type\PhoneTypeController',
	    'person-type' => 'backend\controllers\type\PersonTypeController',
	    'parking-type' => 'backend\controllers\type\ParkingTypeController',
	    'internet-type' => 'backend\controllers\type\InternetTypeController',
	    'facility-type' => 'backend\controllers\type\FacilityTypeController',
	    'email-type' => 'backend\controllers\type\EmailTypeController',
	    'address-type' => 'backend\controllers\type\AddressTypeController',
	    'room-property' => 'backend\controllers\property\RoomPropertyController',
	    'facility-property' => 'backend\controllers\property\FacilityPropertyController',
	    'subject' => 'backend\controllers\subject\SubjectController',
	    'person' => 'backend\controllers\subject\PersonController',
	    'price' => 'backend\controllers\facility\PriceController',
	    'object-property-type' => 'backend\controllers\facility\ObjectPropertyTypeController',
	    'facility' => 'backend\controllers\facility\FacilityController'
    ],
    'params' => $params,
];
