<?php
/* @var $this yii\web\View */
/* @var $model \common\models\facility\Room */
/* @var $displayForm boolean */
/* @var $facilityId integer */
/* @var $form ActiveForm */

use frontend\models\RequestForm;
use frontend\utilities\materialize\ActiveForm;
use yii\captcha\Captcha;

?>

<div id="modal-request" class="modal modal-fixed-footer">
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<h4 class="light"><?= Yii::t('front', 'Booking request'); ?></h4>
			</div>
		</div>
		<?php if ($displayForm === true):
			$requestModel = new RequestForm();
			$labelOptions = ['class' => 'blue-text'];
			$datePickerOptions = [
				'template' => "<i class=\"material-icons prefix\">event</i>\n{label}\n{input}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12 m6'],
				'inputOptions' => [
					'class' => 'datepicker'
				],
				'labelOptions' => $labelOptions
			];
			$defaultOptions = [
				'labelOptions' => $labelOptions
			];
			$form = ActiveForm::begin([
				'id' => 'booking-request-form',
				'options' => [
					'class' => 'white-form'
				]
			]);
		?>

		<div class="row">
		<?php
			if ($model->id) {
				echo '<div class="col s12"><span class="blue-text">'. Yii::t('front', 'Room') . '</span><br />' . $model->title . '</div>';
			} else {
				echo $form->field($requestModel, 'roomId', $defaultOptions)->dropDownList($model->getFacilityRoomOptions($facilityId));
			}
		?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'dateFrom', $datePickerOptions); ?>
			<?= $form->field($requestModel, 'dateTo', $datePickerOptions); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'note', [
				'template' => "<i class=\"material-icons prefix\">mode_edit</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12'],
				'inputOptions' => [
					'class' => 'materialize-textarea'
				],
				'labelOptions' => $labelOptions
			])->textarea(); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'name', [
				'template' => "<i class=\"material-icons prefix\">account_circle</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12'],
				'labelOptions' => $labelOptions
			]); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'email', [
				'template' => "<i class=\"material-icons prefix\">email</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12 m6'],
				'labelOptions' => $labelOptions
			]); ?>
			<?= $form->field($requestModel, 'phone', [
				'template' => "<i class=\"material-icons prefix\">phone</i>\n{input}\n{label}\n{hint}\n{error}",
				'options' => ['class'=> 'input-field col s12 m6'],
				'labelOptions' => $labelOptions
			]); ?>
		</div>
		<div class="row">
			<?= $form->field($requestModel, 'verifyCode', [
				'options' => ['class'=> 'input-field col s12 m6'],
				'labelOptions' => $labelOptions
			])->widget(Captcha::className(), [
				'template' => '<div class="row"><div class="col s4">{image}</div><div class="s8">{input}</div></div>'
			]); ?>
		</div>
		<?php else: ?>
			<p>Tady není ale vůbec žádný formulář</p>
		<?php endif; ?>
	</div>
	<div class="modal-footer">
		<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Zavřít wokno</a>
		<?php if ($displayForm === true): ?>
			<a href="#" class="modal-action waves-effect waves-green btn-flat">Poslat to dál</a>
		<?php endif; ?>
	</div>
</div>