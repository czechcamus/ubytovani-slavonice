<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\ContactForm */

use frontend\utilities\materialize\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

?>

<?php
$baseClass = 'input-field';
$template = "\n{input}\n{label}\n{hint}\n{error}";
$labelOptions = ['class' => 'blue-text text-lighten-4'];

$form = ActiveForm::begin([
	'action' => ['site/contact'],
	'options' => [
		'class' => 'contact-form'
	]
]); ?>

	<div class="row">
		<div class="col s12">
			<h5 class="white-text light"><?= Yii::t('front', 'Contact form'); ?></h5>
		</div>

		<?= $form->field($model, 'name', [
			'template' => "<i class=\"material-icons white-text prefix\">account_circle</i>$template",
			'options' => ['class' => "$baseClass col s12 l6"],
			'labelOptions' => $labelOptions
		]); ?>

		<?= $form->field($model, 'email', [
			'template' => "<i class=\"material-icons white-text prefix\">email</i>$template",
			'options' => ['class' => "$baseClass col s12 l6"],
			'labelOptions' => $labelOptions
		]); ?>

		<?= $form->field($model, 'message', [
			'template' => "<i class=\"material-icons white-text prefix\">mode_edit</i>$template",
			'options' => ['class' => "$baseClass col s12"],
			'inputOptions' => [
				'class' => 'materialize-textarea'
			],
			'labelOptions' => $labelOptions
		])->textarea(); ?>
	</div>
	<div class="row">
		<?= $form->field($model, 'verifyCode', [
			'template' => "{input}\n{label}\n{hint}\n{error}",
			'options' => ['class' => "$baseClass col s12 l6"],
			'labelOptions' => $labelOptions
		])->widget(Captcha::className(), [
			'captchaAction' => 'site/contactCaptcha',
			'imageOptions' => ['class' => 'captcha-prefix responsive-img']
		]); ?>
		<div class="col s12 l6">
			<?= Html::submitButton( Yii::t( 'front', 'Send message' ) . '<i class="material-icons right">send</i>', [
				'class' => 'orange waves-effect waves-light btn'
			]); ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>
