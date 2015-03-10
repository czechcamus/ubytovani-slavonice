<?php

use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomForm */

echo GridView::widget([
	'layout'       => "{items}",
	'dataProvider' => new ActiveDataProvider([
		'query' => $model->getPrices()
	]),
	'columns'      => [
		'title',
		'fee',
		[
			'label' => Yii::t('back', 'VAT'),
			'attribute' => 'tax.tax_value'
		],
		[
			'class'      => ActionColumn::className(),
			'controller' => 'price',
			'header'     => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
			                        Yii::t('back', 'Add new'),
				['price/create', 'relation_id' => $model->room_id]),
			'template'   => '{update} {delete}',
			'buttons'    => [
				'update' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
						$url . '&relation_id=' . $model->room_id, [
							'title'     => Yii::t('back', 'Update'),
							'data-pjax' => '0',
						]);
				},
				'delete' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-trash"></span>',
						$url . '&relation_id=' . $model->room_id, [
							'title'        => Yii::t('back', 'Delete'),
							'data-method'  => 'post',
							'data-confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
							'data-pjax'    => '0',
						]);
				}
			]
		]
	]
]);
