<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 8.3.2015
 * Time: 23:57
 */

namespace backend\assets;


use kartik\base\AssetBundle;

class FormGridAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
	];
	public $js = [
		'js/form-grid.js'
	];
	public $depends = [
		'backend\assets\AppAsset'
	];

}