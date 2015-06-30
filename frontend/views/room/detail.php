<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Room */

use common\models\BookingRequest;
use frontend\assets\CalendarAsset;
use frontend\components\Calendar;
use frontend\components\Prices;
use frontend\components\Properties;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

$this->title = $model->facility->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('front', 'list of accommodation') . Yii::$app->params['breadCrumbsDelimiter'], 'url' => ['facility/index'], 'encode' => false];
$this->params['breadcrumbs'][] = ['label' => $model->facility->title . Yii::$app->params['breadCrumbsDelimiter'], 'url' => ['facility/detail', 'id' => $model->facility_id], 'encode' => false];
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
			<p><?= $model->roomType->title . ', ' . $model->note; ?></p>
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
			<?= Html::a('<i class="material-icons right">arrow_forward</i>' . Yii::t('front', 'Booking request'), '#modal-request', [
				'class' => 'btn waves-effect waves-light modal-trigger'
			]); ?>
		</div>
	</div>
</div>

<?= $this->renderFile('@app/views/general/modalRequest.php', [
	'model' => $model,
	'requestModel' => new BookingRequest,
	'facilityId' => $model->facility_id
]); ?>