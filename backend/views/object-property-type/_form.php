<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyType */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="object-property-type-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">
	    <?= $form->field($model, 'type_id')->dropDownList($model->isNewRecord ? $model->getPropertyTypeOptions($model->objectProperty->property->model_type, $model->object_property_id) :
		    $model->getPropertyTypeOptions($model->objectProperty->property->model_type, $model->object_property_id, $model->type_id)) ?>
		</div>

	</div>

	<?= Html::activeHiddenInput($model, 'object_property_id'); ?>

	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton(Yii::t('back', 'Close'), [
	        'id' => 'cancel-btn',
	        'class' => 'btn btn-warning',
	        'data-cancel-url' => $returnUrl
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
