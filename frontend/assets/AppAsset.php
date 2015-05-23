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
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $baseUrl = '@web';
    public $css = [
	    //'back-to-top/css/style.css',
        'css/site.css'
    ];
    public $js = [
	    'back-to-top/js/main.js',
	    'js/site.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
	    'webmaxx\materialize\MaterializeAsset',
    ];
}
