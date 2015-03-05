<?php


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
			'query' => $model->getRooms($model->facility_id)
		]),
		'columns' => [
			'title',
			[
				'label' => Yii::t('back', 'Type'),
				'value' => function ($data) {
					return $data->type->title;
				},
			],
			[
				'class' => ActionColumn::className(),
				'controller' => 'room',
				'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' . Yii::t('back', 'Add new'), ['room/create', 'relation_id' => $model->facility_id]),
				'template' => '{update} {delete}',
				'buttons' => [
					'update' => function($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->object_property_id, [
							'title' => Yii::t('back', 'Update'),
							'data-pjax' => '0',
						]);
					},
					'delete' => function($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&relation_id=' . $model->object_property_id, [
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