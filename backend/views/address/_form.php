<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Address */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">

		    <?= $form->field($model, 'address_type_id')->dropDownList($model->getAddressTypeOptions(), ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-8 col-md-4">

		    <?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

	    </div>

		<div class="col-sm-4 col-md-2">

			<?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-4 col-md-2">

			<?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

		</div>

		<div class="col-sm-8 col-md-4">

		    <?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-12 col-md-6">

		    <?= $form->field($model, 'state_id')->dropDownList($model->getStateOptions(), ['prompt' => Yii::t('back', '-- choose a country --')]) ?>

		</div>

	</div>

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
