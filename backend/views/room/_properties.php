<?php

use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomForm */

$secondColNr = ceil((count($model->properties) / 2));
$i = 0;
$close = false;
echo '<div class="row">';
foreach ($model->properties as $key => $property) {
	if (($i == 0) || ($i == $secondColNr)) {
		echo '<div class="col-sm-12 col-md-6">';
		$close = true;
	}
	echo '<div class="checkbox">';
	echo Html::hiddenInput('RoomForm[properties][' . $key . '][id]', $property['id']);
	echo Html::hiddenInput('RoomForm[properties][' . $key . '][property_id]', $property['property_id']);
	echo Html::checkbox('RoomForm[properties][' . $key . '][property_value]', $property['property_value'], [
		'label'        => Html::tag('strong', $property['property_title']),
		'labelOptions' => [
			'id'    => 'property_' . $property['property_id'],
			'class' => 'propertySwitch'
		],
		'onclick'      => 'togglePropertyNote(' . $property['property_id'] . ')'
	]);
	echo '<div class="property-details' . ($property['property_value'] ? ' visible' : '') . '">';
	echo Html::textInput('RoomForm[properties][' . $key . '][property_note]', $property['property_note'], [
		'class'       => 'form-control',
		'placeholder' => Yii::t('back', 'Property Note')
	]);
	if (isset($model->facility_id) && $property['property_value'] && $property['types']) {
		echo '<div style="padding-top: 10px">';
		echo GridView::widget([
			'layout'       => "{items}",
			'dataProvider' => new ActiveDataProvider([
				'query' => $model->getPropertyTypes($property['id'])
			]),
			'columns'      => [
				[
					'label' => Yii::t('back', 'Type'),
					'value' => function ($data) {
						return $data->type->title;
					},
				],
				[
					'class'      => ActionColumn::className(),
					'controller' => 'object-property-type',
					'header'     => $model->existsFreeTypes($property['property_id'],
						$property['id']) ? Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
                            Yii::t('back', 'Add new'), [
								'object-property-type/create',
								'object_property_id' => $property['id']
							]) : '',
					'template'   => $model->existsFreeTypes($property['property_id'],
						$property['id']) ? '{update} {delete}' : '{delete}',
					'buttons'    => [
						'update' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
								$url, [
									'title'     => Yii::t('back', 'Update'),
									'data-pjax' => '0',
								]);
						},
						'delete' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-trash"></span>',
								$url, [
									'title'        => Yii::t('back', 'Delete'),
									'class' => 'grid-delete-btn',
									'data' => [
										'confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
										'pjax' => '0'
									]
								]);
						}
					]
				]
			]
		]);
		echo '</div>';
	}
	if (isset($model->facility_id) && $property['property_value'] && $property['fees']) {
		echo '<div style="padding-top: 10px">';
		echo GridView::widget([
			'layout'       => "{items}",
			'dataProvider' => new ActiveDataProvider([
				'query' => $model->getPropertyFees($property['id'])
			]),
			'columns'      => [
				[
					'label'     => Yii::t('back', 'Fee'),
					'attribute' => 'title'
				],
				'value',
				[
					'class'      => ActionColumn::className(),
					'controller' => 'object-property-fee',
					'header'     => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
					                        Yii::t('back', 'Add new'),
						['object-property-fee/create', 'relation_id' => $property['id']]),
					'template'   => '{update} {delete}',
					'buttons'    => [
						'update' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
								$url . '&relation_id=' . $model->object_property_id, [
									'title'     => Yii::t('back', 'Update'),
									'data-pjax' => '0',
								]);
						},
						'delete' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-trash"></span>',
								$url . '&relation_id=' . $model->object_property_id, [
									'title'        => Yii::t('back', 'Delete'),
									'class' => 'grid-delete-btn',
									'data' => [
										'confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
										'pjax' => '0'
									]
								]);
						}
					]
				]
			]
		]);
		echo '</div>';
	}
	echo '</div></div>';
	if (($i == ($secondColNr - 1)) || ($i == (2 * $secondColNr - 1))) {
		echo '</div>';
		$close = false;
	}
	++$i;
}
if ($close)
	echo '</div>';
echo '</div>';