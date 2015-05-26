<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'Ubytování ve Slavonicích',
    'controllerNamespace' => 'frontend\controllers',
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
            'errorAction' => 'site/error',
        ],
        'i18n' => [
	        'translations' => [
		        'front*' => [
			        'class' => 'yii\i18n\PhpMessageSource',
			        'fileMap' => [
				        'front' => 'front.php',
				        'front/error' => 'error.php',
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
    ],
    'params' => $params,
];
