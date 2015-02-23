<?php

use yii\bootstrap\ActiveField;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\Spinner;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Tax */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="tax-form">

    <?php $form = ActiveForm::begin([
	    'layout' => 'horizontal',
	    'fieldClass' => ActiveField::className(),
	    'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'tax_value')->widget(Spinner::className()) ?>

    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-8">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
