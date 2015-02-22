<?php

use backend\assets\FormAsset;
use yii\bootstrap\ActiveField;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\facility\FacilityProperty */
/* @var $form yii\bootstrap\ActiveForm */

FormAsset::register($this);
?>

<div class="facility-property-form">

    <?php $form = ActiveForm::begin([
	    'layout' => 'horizontal',
	    'fieldClass' => ActiveField::className(),
	    'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'fee', [
	    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">CZK</span>{input}<span class="input-group-addon">,00</span></div>'
    ])->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'fee_note')->textInput(['maxlength' => 100]) ?>

	<?= $form->field($model, 'typeSwitch')->checkbox(['id' => 'typeSwitch']) ?>

	<div class="property-type">

		<?= $form->field($model, 'type')->dropDownList($model->getTypeOptions(), [
			'id' => 'property-type',
			'data-source-url' => Url::to(['facility-property/type-list-options']),
		]) ?>

		<div class="type-options">
			<?= $form->field($model, 'type_id')->dropDownList([]) ?>
		</div>

	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
