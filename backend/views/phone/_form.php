<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Phone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone_type_id')->textInput() ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
