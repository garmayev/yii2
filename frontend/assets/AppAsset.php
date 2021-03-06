<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/site.css',
		'css/antarktida.less',
	];
	public $js = [
		'//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];

	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];



	/* public function init()
	{
		parent::init();
		\Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
			'css' => [],
			'js' => []
		];
	} */
}
