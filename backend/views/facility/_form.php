<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facility-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'facility_type_id')->dropDownList($model->getFacilityTypeOptions()) ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'partner')->textInput() ?>

    <?= $form->field($model, 'place_type_id')->textInput() ?>

    <?= $form->field($model, 'facility_type_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'weburl')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'checkin_from')->textInput() ?>

    <?= $form->field($model, 'checkin_to')->textInput() ?>

    <?= $form->field($model, 'checkout_from')->textInput() ?>

    <?= $form->field($model, 'checkout_to')->textInput() ?>

    <?= $form->field($model, 'certificate')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'stars')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
