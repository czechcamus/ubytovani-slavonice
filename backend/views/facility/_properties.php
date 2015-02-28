<?php

use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
?>

<div class="form-group">

	<h4><?= Yii::t('back', 'Facility Properties') ?></h4>

	<?php
	foreach ($model->properties as $key => $property) {
		echo '<div class="col-sm-offset-2 col-sm-8"><div class="checkbox">';
		echo Html::hiddenInput('FacilityForm[properties][' . $key . '][id]', $property['id']);
		echo Html::hiddenInput('FacilityForm[properties][' . $key . '][property_id]', $property['property_id']);
		echo Html::checkbox('FacilityForm[properties][' . $key . '][property_value]', $property['property_value'], [
			'label' => $property['property_title'],
			'labelOptions' => [
				'id' => 'property_' . $property['property_id'],
				'class' => 'propertySwitch'
			],
			'onclick' => 'togglePropertyNote(' . $property['property_id'] . ')'
		]);
		echo '<div class="property-details' . ($property['property_value'] ? ' visible' : '') . '">';
		echo Html::textInput('FacilityForm[properties][' . $key . '][property_note]', $property['property_note'], [
			'class' => 'form-control',
			'placeholder' => Yii::t('back', 'Property Note')
		]);
		if (isset($model->facility_id) && $property['id'] && $property['types']) {
			echo '<div style="padding-top: 10px">';
			echo '<em>' . Yii::t('back', 'Types') . '</em>';
			echo GridView::widget([
				'layout' => "{items}",
				'dataProvider' => new ActiveDataProvider([
					'query' => $model->getPropertyTypes($property['id'])
				]),
				'columns' => [
					[
						'label' => Yii::t('back', 'Property Type'),
						'value' => function ($data) {
							return $data->type->title;
						},
					],
					[
						'class' => ActionColumn::className(),
						'controller' => 'object-property-type',
						'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
						                    Yii::t('back', 'Add new'), ['object-property-type/create', 'relation_id' => $property['id']]),
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
			echo '</div>';
		}
		if (isset($model->facility_id) && $property['id'] && $property['fees']) {
			echo '<div style="padding-top: 10px">';
			echo '<em>' . Yii::t('back', 'Fees') . '</em>';
			echo GridView::widget([
				'layout' => "{items}",
				'dataProvider' => new ActiveDataProvider([
					'query' => $model->getFees($property['id'])
				]),
				'columns' => [
					'title',
					'values',
					'tax.tax_value',
					[
						'class' => ActionColumn::className(),
						'controller' => 'fee',
						'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
						                    Yii::t('back', 'Add new'), ['fee/create', 'relation_id' => $property['id']]),
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
			echo '</div>';
		}
		echo '</div></div></div>';
	}
	?>
</div>