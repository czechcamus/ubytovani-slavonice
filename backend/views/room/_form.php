<?php

use backend\assets\FormRoomAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomForm */
/* @var $facilityModel common\models\facility\Facility */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */

FormRoomAsset::register($this);
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">

		    <?= $form->field($model, 'room_type_id')->dropDownList($model->getRoomTypeOptions()) ?>

			<div class="row">

				<div class="col-md-6">

				    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

			    </div>

				<div class="col-md-3">

					<?= $form->field($model, 'bed_nr')->textInput() ?>

				</div>

				<div class="col-md-3">

				    <?= $form->field($model, 'nr')->textInput() ?>

				</div>

			</div>

            <?= $form->field($model, 'note')->textInput(['maxlength' => 150]) ?>

			<?=	$this->render('_prices', compact('model'));	?>

		</div>

		<?php if ($facilityModel->partner): ?>

			<div class="col-sm-12 col-md-6">

				<?= $this->render('_properties', compact('model')); ?>

			</div>

		<?php endif; ?>

	</div>

    <div class="form-group">
	    <?= Html::submitButton(Yii::t('back', 'Save'), [
		    'class' => 'btn btn-primary'
	    ]) ?>
	    <?= Html::submitButton(Yii::t('back', 'Close'), [
		    'id' => 'cancel-btn',
		    'class' => 'btn btn-warning',
		    'data-cancel-url' => $returnUrl
	    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
