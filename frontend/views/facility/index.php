<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use frontend\utilities\materialize\LinkPager;
use yii\widgets\ListView;

$this->title = 'Seznam ubytování';

echo ListView::widget([
	'dataProvider' => $dataProvider,
	'options' => [
		'class' => 'section container'
	],
	//'summary' => '',
	'layout' => "<div class='row'>{items}</div>\n{pager}",
	'pager' => [
		'class' => LinkPager::className()
	],
	'itemView' => '_facility'
]);