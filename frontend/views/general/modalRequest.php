<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Room */
/* @var $requestModel common\models\BookingRequest */
/* @var $facilityId integer */
/* @var $form ActiveForm */

use frontend\utilities\materialize\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

?>

<div id="modal-request" class="modal modal-fixed-footer">
	<?php
	$template = "\n{input}\n{label}\n{hint}\n{error}";
	$datePickerOptions = [
		'template' => "<i class=\"material-icons prefix\">event</i>\n{label}\n{input}\n{hint}\n{error}",
		'options' => ['class'=> 'input-field col s12 m6'],
		'inputOptions' => [
			'class' => 'datepicker'
		]
	];
	$form = ActiveForm::begin([
		'id' => 'booking-request-form',
		'action' => ['room/send-request'],
		'options' => [
			'class' => 'white-form'
		],
	]);
	?>

	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<h4 class="light"><?= Yii::t('front', 'Booking request'); ?></h4>
			</div>
		</div>

		<div class="row">
		<?php
			if ($model->id) {
				echo '<div class="input-field col s12">';
				echo '<i class="material-icons prefix grey-text">room</i>';
				echo Html::input('text', 'roomTitle', $model->title, ['disabled' => 'disabled']);
				echo Html::label(Yii::t('front', 'Room'));
				echo $form->field($requestModel, 'room_id', ['template' => '{input}'])->hiddenInput(['value' => $model->id]);
				echo '</div>';
			} else {
				$requestModel->room_id = $model->getFacilityRoomFirstId($facilityId);
				echo $form->field($requestModel, 'room_id', [
						'template' => "<i class=\"material-icons prefix\">room</i>$template",
						'options' => ['class'=> 'input-field col s12']
					])->listBox($model->getFacilityRoomOptions($facilityId));
			}
		?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'date_from', $datePickerOptions); ?>
			<?= $form->field($requestModel, 'date_to', $datePickerOptions); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'note', [
				'template' => "<i class=\"material-icons prefix\">mode_edit</i>$template",
				'options' => ['class'=> 'input-field col s12'],
				'inputOptions' => [
					'class' => 'materialize-textarea'
				]
			])->textarea(); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'name', [
				'template' => "<i class=\"material-icons prefix\">account_circle</i>$template",
				'options' => ['class'=> 'input-field col s12']
			]); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'email', [
				'template' => "<i class=\"material-icons prefix\">email</i>$template",
				'options' => ['class'=> 'input-field col s12 m6']
			]); ?>
			<?= $form->field($requestModel, 'phone', [
				'template' => "<i class=\"material-icons prefix\">phone</i>$template",
				'options' => ['class'=> 'input-field col s12 m6']
			]); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'verifyCode', [
				'template' => "{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12 m6']
			])->widget(Captcha::className(), [
				'imageOptions' => ['class' => 'captcha-prefix responsive-img']
			]); ?>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat"><?= Yii::t('front', 'Close'); ?></a>
		<?= Html::submitButton( Yii::t( 'front', 'Send request' ), [
				'class' => 'modal-action waves-effect waves-green btn-flat'
		]); ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>