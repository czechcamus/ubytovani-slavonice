<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use frontend\utilities\materialize\LinkPager;
use yii\widgets\ListView;

$this->title = 'Seznam ubytování';

echo ListView::widget([
	'dataProvider' => $dataProvider,
	'options' => [
		'class' => 'list-view section container'
	],
	'summary' => '',
	'pager' => [
		'class' => LinkPager::className()
	],
	'itemView' => '_facility'
]);