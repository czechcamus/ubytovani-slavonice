<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PageAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $baseUrl = '@web';
	public $css = [
		'css/page.css'
	];
    public $js = [
	    'https://maps.googleapis.com/maps/api/js?key=AIzaSyB4C7dmE9B9wG2ZvfWQK8TYTwPrqAJgr58',
	    'js/page.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset'
    ];
}
