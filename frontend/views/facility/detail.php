<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use frontend\components\FacilityImage;
use yii\widgets\Breadcrumbs;

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('front', 'seznam ubytování') . ' <i class="mdi-hardware-keyboard-arrow-right orange-text"></i>', 'url' => ['index'], 'encode' => false];
$this->params['breadcrumbs'][] = $model->title;
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
			<div class="row">
				<div class="col s12" style="overflow: hidden">
					<?php
						$coord = new LatLng(['lat' => $model->latitude, 'lng' => $model->longitude]);
						$map = new Map([
							'center' => $coord,
							'zoom' => 16
						]);
						$marker = new Marker([
							'position' => $coord,
							'title' => $model->title
						]);
						$map->addOverlay($marker);
						echo $map->display();
					?>
				</div>
			</div>
		</div>
		<div class="col s12 m6">

		</div>
	</div>
</div>