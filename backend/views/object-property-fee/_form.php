<?php

use yii\bootstrap\ActiveField;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyFee */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */

?>

<div class="object-property-fee-form">

	<?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-6 col-md-8">
			<?= $form->field($model, 'title')->textInput() ?>
		</div>

		<div class="col-sm-3 col-md-2">
			<?= $form->field($model, 'value')->widget(MaskedInput::className(), ['clientOptions' => [
				'alias' =>  'decimal',
				'radixPoint' =>  ',',
				'digits' => 2
			]]) ?>
		</div>

		<div class="col-sm-3 col-md-2">
			<?= $form->field($model, 'tax_id')->dropDownList($model->getTaxValueOptions()) ?>
		</div>

	</div>

	<?= Html::activeHiddenInput($model, 'object_property_id'); ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::submitButton(Yii::t('back', 'Cancel'), [
			'id' => 'cancel-btn',
			'class' => 'btn btn-warning',
			'data-cancel-url' => $returnUrl
		]) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
