<?php

use backend\assets\FormFacilityAsset;
use backend\models\FacilityForm;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
/* @var $form yii\bootstrap\ActiveForm */

$session = Yii::$app->session;

FormFacilityAsset::register($this);
?>

<div class="facility-form">

	<?php $form = ActiveForm::begin(); ?>

	<?php
	$items_basic = [
		[
			'label'   => Yii::t('back', 'Facility basic info'),
			'content' => $this->render('_facility', compact('model', 'form')),
			'active'  => ($session->get('actual_tab') == FacilityForm::FACILITIES_TAB || (!$session->has('actual_tab'))) ? true : false,
			'linkOptions' => [
				'data-tab-url' => Url::to(['facility/set-actual-tab', 'tab_id' => FacilityForm::FACILITIES_TAB])
			]
		]
	];
	$items_rooms = $items_properties = $items_images = [];

	if ($model->facility_id) {
		if ($model->partner) {
			$items_properties = [
				[
					'label'   => Yii::t('back', 'Facility properties'),
					'content' => $this->render('_properties', compact('model')),
					'active'  => ($session->get('actual_tab') == FacilityForm::PROPERTIES_TAB) ? true : false,
					'linkOptions' => [
						'data-tab-url' => Url::to(['facility/set-actual-tab', 'tab_id' => FacilityForm::PROPERTIES_TAB])
					]
				]
			];
		}
		$items_rooms = [
			[
				'label'   => Yii::t('back', 'Facility rooms'),
				'content' => $this->render('_rooms', compact('model')),
				'active'  => ($session->get('actual_tab') == FacilityForm::ROOMS_TAB) ? true : false,
				'linkOptions' => [
					'data-tab-url' => Url::to(['facility/set-actual-tab', 'tab_id' => FacilityForm::ROOMS_TAB])
				]
			]
		];
		$items_images = [
			[
				'label'   => Yii::t('back', 'Facility images'),
				'content' => $this->render('_images', compact('model')),
				'active'  => ($session->get('actual_tab') == FacilityForm::IMAGES_TAB) ? true : false,
				'linkOptions' => [
					'data-tab-url' => Url::to(['facility/set-actual-tab', 'tab_id' => FacilityForm::IMAGES_TAB])
				]
			]
		];
	}

	$items = ArrayHelper::merge($items_basic, $items_properties, $items_rooms, $items_images);
	?>

	<?= Tabs::widget([
		'itemOptions' => [
			'style' => 'padding: 30px 0 15px'
		],
		'items' => $items
	]); ?>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('back', 'Save'),
			['class' => 'btn btn-primary']) ?>
		<?= Html::submitButton(Yii::t('back', 'Cancel'), [
			'id' => 'cancel-btn',
			'class' => 'btn btn-warning',
			'data-cancel-url' => Url::to(['index'])
		]) ?>

	</div>

	<?php ActiveForm::end(); ?>
</div>