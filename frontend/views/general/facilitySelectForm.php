<?php
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FacilitySearchForm */

use common\models\Place;
use common\models\type\FacilityType;
use frontend\components\FacilitySearchPropertyList;
use frontend\utilities\materialize\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([
	'method' => 'get',
	'action' => ['facility/index'],
	'options' => [
		'class' => 'facility-select-form orange'
	]
]); ?>

	<div class="row">
		<div class="col s12">
			<h4 class="white-text light"><i class="mdi-action-search left"></i> <?= Yii::t('front', 'Search for accomodation in Slavonice'); ?></h4>
		</div>

		<?= $form->field($searchModel, 'place_id')->dropDownList( Place::getPlaceOptions(true) ); ?>

		<?= $form->field($searchModel, 'facility_type_id')->dropDownList( FacilityType::getFacilityTypeOptions(true) ); ?>

		<div class="col s12">
			<div class="row">

				<?= $form->field($searchModel, 'priceFrom', [
					'options' => ['class' => 'input-field col s12 m6']
				])->input('number'); ?>

				<?= $form->field($searchModel, 'priceTo', [
					'options' => ['class' => 'input-field col s12 m6']
				])->input('number'); ?>

				<?= $form->field($searchModel, 'bedNr', [
					'options' => ['class' => 'input-field col s12 m6']
				])->input('number'); ?>

			</div>
		</div>
		<div class="col s12">
			<ul class="collapsible" data-collapsible="accordion">
				<li>
					<div class="collapsible-header white-text"><?= Yii::t('front', 'Advanced options of searching'); ?> <i class="mdi-hardware-keyboard-arrow-down"></i> *</div>
					<div class="collapsible-body white-text">
						<div class="row">
							<div class="col s12">
								<h5 class="light"><?= Yii::t('front', 'Requested attributes of accommodations facility'); ?></h5>
							</div>
							<?= FacilitySearchPropertyList::widget([
								'properties' => $searchModel->facilityProperties,
								'propertyName' => 'FacilitySearchForm[facilityProperties]',
								'wrapperOptions' => [
									'class' => 'col s12 m6'
								]
							]);
							?>
						</div>
						<div class="row">
							<div class="col s12">
								<h5 class="light"><?= Yii::t('front', 'Requested attributes of room'); ?></h5>
							</div>
							<?= FacilitySearchPropertyList::widget([
								'properties' => $searchModel->roomProperties,
								'propertyName' => 'FacilitySearchForm[roomProperties]',
								'wrapperOptions' => [
									'class' => 'col s12 m6'
								]
							]);
							?>
						</div>
						<div class="row">
							<div class="col s12">
								* rozšířené možnosti vyhledávání se uplatní pouze u partnerských ubytovacích zařízení
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<?= Html::submitButton(Yii::t('front', 'Search') . '<i class="mdi-action-search right"></i>', [
				'class' => 'btn waves-effect waves-light'
			]); ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>
