<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Url;
use yii\jui\Spinner;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model backend\models\FacilityForm */
?>

<div class="row">

	<div class="col-sm-12 col-md-6">

		<?= $form->field($model, 'facility_type_id')->dropDownList($model->getFacilityTypeOptions()) ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'subject_id')->dropDownList($model->getSubjectOptions(), [
			'prompt'          => Yii::t('back', '-- not selected --'),
			'id'              => 'subject-id',
			'data-source-url' => Url::to(['person/get-subject-person-list'])
		]) ?>

		<?= $form->field($model, 'person_id')->dropDownList($model->getPersonOptions(), [
			'prompt'     => Yii::t('back', '-- not selected --'),
			'id'         => 'person-id',
			'data-value' => $model->person_id
		]) ?>

		<?= $form->field($model, 'place_type_id')->dropDownList($model->getPlaceTypeOptions()) ?>

	</div>

	<div class="col-sm-12 col-md-6">

		<?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

		<?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

		<?= $form->field($model, 'weburl')->textInput(['maxlength' => 100]) ?>

	</div>

</div>

<div class="row">

	<div class="col-md-6">

		<?= $form->field($model, 'active')->checkbox() ?>

	</div>

	<div class="col-md-6">

		<?= $form->field($model, 'partner')->checkbox(['id' => 'partner-switch']) ?>

	</div>

</div>

<div id="partner-fields"<?= $model->partner ? ' class="visible"' : ''; ?>>

	<div class="row">

		<div class="col-sm-12 col-md-6">

			<?= $form->field($model, 'certificate')->textInput(['maxlength' => 100]) ?>

		</div>

		<div class="col-sm-12 col-md-6">

			<?= $form->field($model, 'stars', [
				'inputTemplate' => '<div>{input}</div>'
			])->widget(Spinner::className()) ?>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-6 col-md-3">

			<?= $form->field($model, 'checkin_from')->widget(DateControl::classname(), [
				'type' => DateControl::FORMAT_TIME
			]) ?>

		</div>

		<div class="col-sm-6 col-md-3">

			<?= $form->field($model, 'checkin_to')->widget(DateControl::classname(), [
				'type' => DateControl::FORMAT_TIME
			]) ?>

		</div>

		<div class="col-sm-6 col-md-3">

			<?= $form->field($model, 'checkout_from')->widget(DateControl::classname(), [
				'type' => DateControl::FORMAT_TIME
			]) ?>

		</div>

		<div class="col-sm-6 col-md-3">

			<?= $form->field($model, 'checkout_to')->widget(DateControl::classname(), [
				'type' => DateControl::FORMAT_TIME
			]) ?>

		</div>

	</div>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

</div>