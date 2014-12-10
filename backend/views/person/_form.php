<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'front_title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'back_title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
