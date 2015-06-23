<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Room */

use frontend\assets\CalendarAsset;
use frontend\components\Calendar;
use frontend\components\Prices;
use frontend\components\Properties;
use yii\widgets\Breadcrumbs;

$this->title = $model->facility->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('front', 'list of accommodation') . ' <i class="mdi-hardware-keyboard-arrow-right orange-text"></i>', 'url' => ['facility/index'], 'encode' => false];
$this->params['breadcrumbs'][] = ['label' => $model->facility->title . ' <i class="mdi-hardware-keyboard-arrow-right orange-text"></i>', 'url' => ['facility/detail', 'id' => $model->facility_id], 'encode' => false];
$this->params['breadcrumbs'][] = $model->title;

CalendarAsset::register($this);
?>

<div class="section container room-detail">
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		'homeLink' => false
	]) ?>
	<div class="row">
		<div class="col s12">
			<h2 class="light"><?= Yii::t('front', 'Room') . ': ' . $model->title; ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6">
			<?= Properties::widget(['properties' => $model->roomProperties]); ?>
			<h3 class="light"><?= Yii::t('front', 'Prices'); ?></h3>
			<div class="card blue">
				<div class="card-content white-text">
					<?= Prices::widget(['prices' => $model->prices]); ?>
				</div>
			</div>
		</div>
		<div class="col s12 m6">
			<?= Calendar::widget([
				'roomId' => $model->id
			])?>
		</div>
	</div>
</div>