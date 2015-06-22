<?php

use backend\assets\FormRoomAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomForm */
/* @var $relation_id integer */
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

			<?php if ($model->room_id): ?>

				<strong><?= Yii::t('back', 'Prices'); ?></strong>

				<?=	$this->render('_prices', compact('model'));	?>

			<?php endif; ?>

			<?php if ($model->room_id): ?>

				<strong><?= Yii::t('back', 'Availability'); ?></strong>

				<?=	$this->render('_availabilities', compact('model'));	?>

			<?php endif; ?>

		</div>

		<?php if ($facilityModel->partner && $model->room_id): ?>

			<div class="col-sm-12 col-md-6">

				<?= $this->render('_properties', compact('model')); ?>

			</div>

		<?php endif; ?>

	</div>

    <div class="form-group">
	    <?= Html::submitButton(Yii::t('back', 'Save room'), [
		    'class' => 'btn btn-primary'
	    ]) ?>
	    <?php if ($model->room_id) {
		    echo Html::submitButton(Yii::t('back', 'Create room'), [
			    'id' => 'create-btn',
			    'class' => 'btn btn-success',
			    'data-create-url' => Url::to(['create', 'relation_id' => $relation_id])
		    ]);
	    } ?>
	    <?= Html::submitButton(Yii::t('back', 'Close room'), [
		    'id' => 'cancel-btn',
		    'class' => 'btn btn-warning',
		    'data-cancel-url' => $returnUrl
	    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
