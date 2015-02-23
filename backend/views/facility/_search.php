<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\facility\SearchFacility */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facility-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'partner') ?>

    <?= $form->field($model, 'place_type_id') ?>

    <?php // echo $form->field($model, 'facility_type_id') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'weburl') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house_nr') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'checkin_from') ?>

    <?php // echo $form->field($model, 'checkin_to') ?>

    <?php // echo $form->field($model, 'checkout_from') ?>

    <?php // echo $form->field($model, 'checkout_to') ?>

    <?php // echo $form->field($model, 'certificate') ?>

    <?php // echo $form->field($model, 'stars') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('back', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('back', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
