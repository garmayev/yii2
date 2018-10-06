<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'language' => 'ru',
	'controllerNamespace' => 'frontend\controllers',
	'components' => [
		'i18n' => [
			'translations' => [
				'app*' => [
					'class' => 'yii\i18n\PhpMessageSource',
				],
			],
		],
		'assetManager' => [
			'converter'=> [
				'class'=> 'nizsheanez\assetConverter\Converter',
				'force'=> false, // true : If you want convert your sass each time without time dependency
				'destinationDir' => 'compiled', //at which folder of @webroot put compiled files
				'parsers' => [
					'sass' => [ // file extension to parse
						'class' => 'nizsheanez\assetConverter\Sass',
						'output' => 'css', // parsed output file type
						'options' => [
							'cachePath' => '@app/runtime/cache/sass-parser' // optional options
						],
					],
					'scss' => [ // file extension to parse
						'class' => 'nizsheanez\assetConverter\Sass',
						'output' => 'css', // parsed output file type
						'options' => [] // optional options
					],
					'less' => [ // file extension to parse
						'class' => 'nizsheanez\assetConverter\Less',
						'output' => 'css', // parsed output file type
						'options' => [
							'auto' => true, // optional options
						]
					]
				]
			],
		],
		'request' => [
			'csrfParam' => '_csrf-frontend',
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend',
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
				'' => 'site/index',
				'<action:\w+>' => 'site/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			],
		],
	],
	'params' => $params,
];
