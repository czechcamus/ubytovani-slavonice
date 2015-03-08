<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 8.3.2015
 * Time: 23:57
 */

namespace backend\assets;


use kartik\base\AssetBundle;

class FormRoomAsset extends AssetBundle
{
	public $sourcePath = '@app/assets';
	public $baseUrl = '@web';
	public $css = [
		'css/form-room.css'
	];
	public $js = [
		'js/form-room.js'
	];
	public $depends = [
		'backend\assets\AppAsset'
	];

}