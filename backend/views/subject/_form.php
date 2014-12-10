<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Subject */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_nr')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'tax_nr')->textInput(['maxlength' => 14]) ?>

    <?php if (!$model->isNewRecord): ?>
        <!-- Tady budou tabulky -->
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
