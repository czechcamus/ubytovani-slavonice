<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\property\RoomProperty */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="room-property-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">

			<?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

			<?= $form->field($model, 'types')->checkbox(['id' => 'typeSwitch']) ?>

			<div class="type-options<?= $model->types ? ' visible' : ''; ?>">
				<?= $form->field($model, 'model_type')->dropDownList($model->getTypeOptions()) ?>
			</div>

			<?= $form->field($model, 'fees')->checkbox() ?>

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
