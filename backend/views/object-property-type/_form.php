<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-property-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'object_property_id')->textInput() ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
