<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use frontend\components\FacilityImage;
use frontend\components\Properties;
use frontend\components\Rooms;
use yii\widgets\Breadcrumbs;

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('front', 'list of accommodation') . Yii::$app->params['breadCrumbsDelimiter'], 'url' => ['index'], 'encode' => false];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="section container facility-detail">
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
							'thumbnail' => false,
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
				<div class="col s12">
					<?php
						$coord = new LatLng(['lat' => $model->latitude, 'lng' => $model->longitude]);
						$map = new Map([
							'width' => '100%',
							'height' => 400,
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
			<div class="row">
				<div class="col s12">
					<?php if ($model->partner && ($model->stars > 0)) echo '<span class="right orange-text rating">' . str_repeat('*', $model->stars) . '</span>'; ?>
					<h2 class="light"><?= $model->title; ?></h2>
					<div class="card blue">
						<div class="card-content white-text">
							<address>
								<?= $model->street . ' ' . $model->house_nr; ?><br />
								<?= $model->city; ?><br />
								<?= $model->postal_code; ?>
							</address>
							<?php if ($model->weburl): ?>
								<a href="<?= $model->weburl; ?>" class="orange-text"><i class="material-icons">public</i> <?= $model->weburl; ?></a>
							<?php endif; ?>
						</div>
					</div>
					<?php if ($model->certificate) echo '<p><strong>' . Yii::t('front', 'Certificate') . ':</strong> <em>' . $model->certificate . '</em></p>'; ?>
					<p><?= $model->description; ?></p>
				</div>
			</div>
			<?php if ($model->facilityProperties): ?>
			<div class="row">
				<div class="col s12">
					<?= Properties::widget(['properties' => $model->facilityProperties]); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if ($model->checkin_from || $model->checkin_to || $model->checkout_from || $model->checkout_to): ?>
				<div class="row">
					<div class="col s12 m6">
						<p>
							<strong><?= Yii::t('front', 'Check in from'); ?>:</strong><br />
							<?= Yii::$app->formatter->asTime($model->checkin_from); ?>
						</p>
						<p>
							<strong><?= Yii::t('front', 'Check in to'); ?>:</strong><br />
							<?= Yii::$app->formatter->asTime($model->checkin_to); ?>
						</p>
					</div>
					<div class="col s12 m6">
						<p>
							<strong><?= Yii::t('front', 'Check out from'); ?>:</strong><br />
							<?= Yii::$app->formatter->asTime($model->checkout_from); ?>
						</p>
						<p>
							<strong><?= Yii::t('front', 'Check out to'); ?>:</strong><br />
							<?= Yii::$app->formatter->asTime($model->checkout_to); ?>
						</p>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($model->rooms): ?>
			<div class="row">
				<div class="col s12">
					<?= Rooms::widget(['rooms' => $model->rooms]); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>