<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyFee */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="object-property-fee-form">

	<?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		'fieldConfig' => Yii::$app->params['fieldConfig']
	]); ?>

	<?= $form->field($model, 'title')->textInput() ?>

	<?= $form->field($model, 'value')->widget(MaskedInput::className(), ['clientOptions' => [
		'alias' =>  'decimal',
		'groupSeparator' => ' ',
		'radixPoint' =>  ',',
		'autoGroup' => true
	]]) ?>

	<?= $form->field($model, 'tax_id')->dropDownList($model->getTaxValueOptions()) ?>

	<?= Html::activeHiddenInput($model, 'object_property_id'); ?>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>
