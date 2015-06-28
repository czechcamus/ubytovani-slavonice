<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Room */
/* @var $requestModel common\models\Request */
/* @var $displayForm boolean */
/* @var $facilityId integer */
/* @var $form ActiveForm */

use frontend\utilities\materialize\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

?>

<div id="modal-request" class="modal modal-fixed-footer">
	<?php if ($displayForm === true):
	$datePickerOptions = [
		'template' => "<i class=\"material-icons prefix\">event</i>\n{label}\n{input}\n{hint}\n{error}",
		'options' => ['class'=> 'input-field col s12 m6'],
		'inputOptions' => [
			'class' => 'datepicker'
		]
	];
	$form = ActiveForm::begin([
		'id' => 'booking-request-form',
		'action' => ['sendRequest'],
		'options' => [
			'class' => 'white-form'
		]
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
				echo '</div>';
			} else {
				echo $form->field($requestModel, 'room_id')->dropDownList($model->getFacilityRoomOptions($facilityId));
			}
		?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'date_from', $datePickerOptions); ?>
			<?= $form->field($requestModel, 'date_to', $datePickerOptions); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'note', [
				'template' => "<i class=\"material-icons prefix\">mode_edit</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12'],
				'inputOptions' => [
					'class' => 'materialize-textarea'
				]
			])->textarea(); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'name', [
				'template' => "<i class=\"material-icons prefix\">account_circle</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12']
			]); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'email', [
				'template' => "<i class=\"material-icons prefix\">email</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12 m6']
			]); ?>
			<?= $form->field($requestModel, 'phone', [
				'template' => "<i class=\"material-icons prefix\">phone</i>\n{input}\n{label}\n{hint}\n{error}",
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
		<?php else: ?>
			<p>Tady není ale vůbec žádný formulář</p>
		<?php endif; ?>
	</div>
	<div class="modal-footer">
		<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat"><?= Yii::t('front', 'Close'); ?></a>
		<?php if ($displayForm === true) {
			echo Html::submitButton( Yii::t( 'front', 'Send request' ), [
				'class' => 'modal-action waves-effect waves-green btn-flat'
			]);
		} ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>