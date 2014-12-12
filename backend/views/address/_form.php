<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Address */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'address_type_id')->textInput() ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
