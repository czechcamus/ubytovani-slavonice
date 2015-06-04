<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */

use frontend\components\FacilityImage;
use yii\web\View;
use yii\widgets\Breadcrumbs;

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('front', 'seznam ubytování') . ' <i class="mdi-hardware-keyboard-arrow-right orange-text"></i>', 'url' => ['index'], 'encode' => false];
$this->params['breadcrumbs'][] = $model->title;

//TODO dodělat zadávání zeměpisné šířky
$this->registerJs("
function initialize() {
	var mapOptions = {
	  center: { lat: " . '-34.397' . ", lng: " . '150.644' . "},
	  zoom: 8
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'),
	    mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);
", View::POS_HEAD);
?>

<div class="section container">
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		'homeLink' => false
	]) ?>
	<div class="row">
		<div class="col s12 m6">
			<?php if ($model->images): ?>
				<div class="row">
					<div class="col s12">
						<?= FacilityImage::widget([
							'facilityId' => $model->id,
							'options' => [
								'class' => 'responsive-img'
							]
						]); ?>
					</div>
				</div>
				<div class="row">
					<?php
					foreach ( $model->images as $image ) {
						echo '<div class="col s6 m4 l3">';
						echo FacilityImage::widget([
							'imageId' => $image->id,
							'thumbnail' => true,
							'options' => [
								'class' => 'responsive-img materialboxed',
								'data-caption' => $image->title
							]
						]);
						echo '</div>';
					}
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col s12 m6">

		</div>
	</div>
</div>