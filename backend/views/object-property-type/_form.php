<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyType */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="object-property-type-form">

    <?php $form = ActiveForm::begin([
	    'layout' => 'horizontal',
	    'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'type_id')->dropDownList($model->getPropertyTypeOptions($model->objectProperty->property->model_type, $model->object_property_id)) ?>

	<?= Html::activeHiddenInput($model, 'object_property_id'); ?>

	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-8">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
