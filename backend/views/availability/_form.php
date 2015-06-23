<?php

use common\models\facility\Tax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Availability */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="availability-form">

	<?php $form = ActiveForm::begin([
		'enableClientValidation' => false
	]); ?>

	<div class="row">

		<div class="col-sm-6 col-md-3">
			<?= $form->field($model, 'date_from')->widget(DatePicker::className()); ?>
		</div>

		<div class="col-sm-6 col-md-3">
			<?= $form->field($model, 'date_to')->widget(DatePicker::className()); ?>
		</div>

	</div>

	<div class="row">
		<div class="col-sm-12 col-md-6">
			<?= $form->field($model, 'description')->textInput(['maxlength' => 100]); ?>
		</div>

	</div>

	<?= Html::activeHiddenInput($model, 'room_id'); ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::submitButton(Yii::t('back', 'Close'), [
			'id' => 'cancel-btn',
			'class' => 'btn btn-warning',
			'data-cancel-url' => $returnUrl
		]) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
