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
	        'class' => 'common\components\User',
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
	        'class' => 'common\components\ErrorHandler',
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
        ],
	    'response' => 'common\components\Response'
    ],
    'controllerMap' => [
	    'catering-type' => 'backend\controllers\type\CateringTypeController',
	    'room-type' => 'backend\controllers\type\RoomTypeController',
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
	    'object-property-fee' => 'backend\controllers\facility\ObjectPropertyFeeController',
	    'facility' => 'backend\controllers\facility\FacilityController',
	    'room' => 'backend\controllers\facility\RoomController',
	    'image' => 'backend\controllers\facility\ImageController'
    ],
    'params' => $params,
];
