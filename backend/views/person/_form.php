<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Person */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'front_title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'back_title')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
