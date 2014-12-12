<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Phone */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="phone-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'phone_type_id')->textInput() ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => 15]) ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
