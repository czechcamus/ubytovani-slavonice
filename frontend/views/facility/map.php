<?php
/* @var $this yii\web\View */
/* @var $models common\models\facility\Facility[] */

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use yii\helpers\Html;

$this->title = Yii::t('front', 'Map of facilities');
?>

<div class="section container facility-map">
	<div class="row">
		<div class="col s12">
			<?php
				$center = new LatLng([
					'lat' => Yii::$app->params['mapCenterLat'],
					'lng' => Yii::$app->params['mapCenterLng']
				]);
				$map = new Map([
					'width' => '100%',
					'height' => 640,
					'center' => $center,
					'zoom' => 14
				]);
				foreach ( $models as $model ) {
					$coord = new LatLng([
						'lat' => $model->latitude,
						'lng' => $model->longitude
					]);
					$marker = new Marker([
						'position' => $coord,
						'title' => $model->title
					]);
					$marker->attachInfoWindow(
						new InfoWindow([
							'content' => Html::tag('strong', Html::a(Yii::t('front', 'Details of facility'), ['detail', 'id' => $model->id]))
						])
					);
					$map->addOverlay($marker);
				}
				echo $map->display();
			?>
		</div>
	</div>
</div>
