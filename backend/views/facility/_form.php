<?php

use backend\assets\FormFacilityAsset;
use backend\models\FacilityForm;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
/* @var $form yii\bootstrap\ActiveForm */

FormFacilityAsset::register($this);
?>

<div class="facility-form">

	<?php $form = ActiveForm::begin(); ?>

	<?php
	$items_basic = [
		[
			'label'   => Yii::t('back', 'Facility basic info'),
			'content' => $this->render('_facility', compact('model', 'form')),
			'active'  => ( ! isset($model->actualTab) || ($model->actualTab == FacilityForm::FACILITIES_TAB)) ? true : false
		]
	];
	$items_rooms = $items_properties = $items_images = [];

	if ($model->facility_id) {
		if ($model->partner) {
			$items_properties = [
				[
					'label'   => Yii::t('back', 'Facility properties'),
					'content' => $this->render('_properties', compact('model')),
					'active'  => ($model->actualTab == FacilityForm::PROPERTIES_TAB) ? true : false
				]
			];
		}
		$items_rooms = [
			[
				'label'   => Yii::t('back', 'Facility rooms'),
				'content' => $this->render('_rooms', compact('model')),
				'active'  => ($model->actualTab == FacilityForm::ROOMS_TAB) ? true : false
			]
		];
		$items_images = [
			[
				'label'   => Yii::t('back', 'Facility images'),
				'content' => $this->render('_images', compact('model')),
				'active'  => ($model->actualTab == FacilityForm::IMAGES_TAB) ? true : false
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
	</div>

	<?php ActiveForm::end(); ?>

</div>