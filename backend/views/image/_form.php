<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Image */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="image-form">

	<?= Html::img(Yii::getAlias('@web/') . Yii::$app->params['uploadDir'] . '/thumbnails/' . $model->filename, [
		'alt' => Yii::t('back', 'Image') . ' - ' . Html::encode($model->title)
	]) ?>

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">
		    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>
		    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
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
