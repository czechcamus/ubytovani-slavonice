<?php

use common\models\type\EmailType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Email */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */

$typeList = ArrayHelper::map(EmailType::find()->orderBy('title')->asArray()->all(), 'id', 'title');
?>

<div class="email-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">

		<div class="col-sm-6 col-md-3">

            <?= $form->field($model, 'email_type_id')->dropDownList($typeList, ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

		</div>

		<div class="col-sm-6 col-md-3">

            <?= $form->field($model, 'address')->textInput(['maxlength' => 45]) ?>

		</div>

	</div>

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
