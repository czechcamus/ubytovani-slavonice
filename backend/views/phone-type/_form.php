<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\PhoneType */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="phone-type-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
