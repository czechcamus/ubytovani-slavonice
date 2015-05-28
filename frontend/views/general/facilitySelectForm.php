<?php
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FacilitySearch */

use common\models\Place;
use common\models\type\FacilityType;
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
					<div class="collapsible-header white-text"><?= Yii::t('front', 'Advanced options of searching'); ?> <i class="mdi-hardware-keyboard-arrow-down"></i></div>
					<div class="collapsible-body white-text">
						<div class="row">
							<div class="col s12">
								<h5 class="light"><?= Yii::t('front', 'Requested attributes of accommodations facility'); ?></h5>
							</div>
							<?php
							$i = 0;
							$testValue = 0;
							$elementCnt = count($searchModel->facilityProperties);
							$divider = ceil($elementCnt / 2);
							foreach ( $searchModel->facilityProperties as $key => $title ) {
								$testValue = $i % $divider;
								if ($testValue == 0) {
									echo "<div class=\"col s12 m6\">\n";
								}
								$id = 'facilitysearch-facilityproperties-fp_' . $key;
								echo Html::checkbox('FacilitySearch[facilityProperties][fp_' . $key . ']', false, [
									'id' => $id,
									'value' => 0
								]);
								echo Html::label($title, $id);
								echo "<br />\n";
								if ($testValue == ($divider - 1)) {
									echo "</div>\n";
								}
								++$i;
							}
							if ($testValue != ($divider - 1)) {
								echo "</div>\n";
							}
							?>
						</div>
						<div class="row">
							<div class="col s12">
								<h5 class="light"><?= Yii::t('front', 'Requested attributes of room'); ?></h5>
							</div>
							<div class="col s12 m6">
								<input type="checkbox" id="bathroom" />
								<label for="bathroom">koupelna</label><br />
								<input type="checkbox" id="douche" />
								<label for="douche">sprcha</label>
								<input type="checkbox" id="wc" />
								<label for="wc">WC</label>
							</div>
							<div class="col s12 m6">
								<input type="checkbox" id="room-internet" />
								<label for="room-internet">internet</label><br />
								<input type="checkbox" id="phone" />
								<label for="phone">telefon</label><br />
								<input type="checkbox" id="tv" />
								<label for="tv">TV</label><br />
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<button class="btn waves-effect waves-light" type="submit" name="action"><?= Yii::t('front', 'Search'); ?>
				<i class="mdi-action-search right"></i>
			</button>
		</div>
	</div>
<?php ActiveForm::end(); ?>
