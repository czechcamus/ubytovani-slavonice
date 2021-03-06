<?php namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Materialize javascript files.
 *
 * @author webmaxx <webmaxx@webmaxx.name>
 * @since 2.0
 */
class MaterializeAsset extends AssetBundle
{
	public $basePath = '@webroot/materialize';
	public $baseUrl = '@web/materialize';
    public $js = [
        'js/materialize.min.js',
    ];
	public $depends = [
		'yii\web\YiiAsset'
	];
}
