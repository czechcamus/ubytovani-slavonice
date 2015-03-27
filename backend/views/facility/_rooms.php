<?php

use backend\utilities\PriceColumn;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
?>

<?php if (isset($model->facility_id)) {
	echo GridView::widget([
		'layout' => "{items}",
		'dataProvider' => new ActiveDataProvider([
			'query' => $model->getRooms(),
			'pagination' => [
				'pageSize' => 0,
			]
		]),
		'columns' => [
			'title',
			[
				'label' => Yii::t('back', 'Type'),
				'value' => function ($data) {
					return $data->roomType->title;
				},
			],
			'bed_nr',
			'nr',
			[
				'class' => PriceColumn::className()
			],
			[
				'class' => ActionColumn::className(),
				'controller' => 'room',
				'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' . Yii::t('back', 'Add new'), ['room/create', 'relation_id' => $model->facility_id]),
				'template' => '{update} {delete}',
				'buttons' => [
					'update' => function($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->facility_id, [
							'title' => Yii::t('back', 'Update'),
							'data-pjax' => '0',
						]);
					},
					'delete' => function($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&relation_id=' . $model->facility_id, [
							'title' => Yii::t('back', 'Delete'),
							'data-method' => 'post',
							'data-confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
							'data-pjax' => '0',
						]);
					}
				]
			]
		]
	]);
} ?>