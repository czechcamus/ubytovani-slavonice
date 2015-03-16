<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\State */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="state-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-8 col-md-4">

			<?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

		</div>

		<div class="col-sm-4 col-md-2">

			<?= $form->field($model, 'acronym')->textInput(['maxlength' => 3]) ?>

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
