<?php

use backend\assets\FormFacilityAsset;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\Spinner;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
/* @var $form yii\bootstrap\ActiveForm */

FormFacilityAsset::register($this);
?>

<div class="facility-form">

    <?php $form = ActiveForm::begin([
	    'layout' => 'horizontal',
	    'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

	<?= $form->field($model, 'facility_type_id')->dropDownList($model->getFacilityTypeOptions()) ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

	<?= $form->field($model, 'subject_id')->dropDownList($model->getSubjectOptions(), [
		'prompt' => Yii::t('back', '-- not selected --'),
		'id' => 'subject-id',
		'data-source-url' => Url::to(['person/get-subject-person-list'])
	]) ?>

    <?= $form->field($model, 'person_id')->dropDownList($model->getPersonOptions(), [
	    'prompt' => Yii::t('back', '-- not selected --'),
	    'id' => 'person-id',
	    'data-value' => $model->person_id
    ]) ?>

	<?= $form->field($model, 'place_type_id')->dropDownList($model->getPlaceTypeOptions()) ?>

	<?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

	<?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

	<?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

	<?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

	<?= $form->field($model, 'weburl')->textInput(['maxlength' => 100]) ?>

	<?= $form->field($model, 'partner')->checkbox(['id' => 'partner-switch']) ?>

	<div id="partner-fields"<?= $model->partner ? ' class="visible"' : ''; ?>>

		<?= $form->field($model, 'certificate')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'stars')->widget(Spinner::className()) ?>

	    <?= $form->field($model, 'checkin_from')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'checkin_to')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'checkout_from')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'checkout_to')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<?php if (isset($model->facility_id))
			echo $this->render('_properties', compact('model'));
		?>

	</div>

    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->scenario == 'create' ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->scenario == 'create' ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
