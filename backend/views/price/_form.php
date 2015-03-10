<?php

use common\models\facility\Tax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Price */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="price-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>
        </div>

	</div>

	<div class="row">
		<div class="col-sm-4 col-md-2">
		    <?= $form->field($model, 'fee')->widget(MaskedInput::className(), ['clientOptions' => [
			    'alias' =>  'decimal',
			    'radixPoint' =>  ',',
			    'digits' => 2
		    ]]) ?>
		</div>

		<div class="col-sm-8 col-md-4">
			<?= $form->field($model, 'tax_id')->dropDownList(Tax::getTaxValueOptions()) ?>
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
