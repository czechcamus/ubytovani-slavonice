<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 22:58
 */

namespace backend\assets;


use yii\web\AssetBundle;

class FormFacilityAsset extends AssetBundle
{
	public $sourcePath = '@app/assets';
	public $baseUrl = '@web';
	public $css = [
		'css/form-facility.css'
	];
	public $js = [
		'js/form-facility.js'
	];
	public $depends = [
		'backend\assets\AppAsset'
	];
}