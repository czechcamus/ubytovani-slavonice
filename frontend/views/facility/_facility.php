<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */
/* @var $index integer */

use frontend\components\FacilityImage;
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>

<?php if ($model->partner): ?>
	<div class="partner-facility col s12">
		<div class="row">
			<div class="col s12 l3">
				<?= Html::a(FacilityImage::widget([
					'facilityId' => $model->id,
					'thumbnail' => true,
					'options' => [
						'class' => 'responsive-img'
					]
				]), ['facility/detail', 'id' => $model->id]); ?>
			</div>
			<div class="col s12 l9">
				<p class="right"><?= Html::a(Html::encode($model->place->title),'#'); ?></p>
				<h3 class="light"><?= Html::a(Html::encode($model->title), ['facility/detail', 'id' => $model->id], ['class' => 'black-text']); ?></h3>
				<?php if ($model->stars > 0) echo '<span class="stars orange-text">' . str_repeat('<i class="mdi-action-grade"></i>', $model->stars) . '</span>'; ?>
				<p><?= StringHelper::truncateWords(Html::encode($model->description), 30); ?></p>
				<?= Html::a('<i class="mdi-navigation-arrow-forward right"></i>Detaily ubytování', ['facility/detail', 'id' => $model->id], [
					'class' => 'btn waves-effect waves-light'
				]); ?>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="facility col s12">
		<div class="row">
			<div class="col s12 l4">
				<?= Html::a(FacilityImage::widget([
					'facilityId' => $model->id,
					'thumbnail' => true,
					'options' => [
						'class' => 'responsive-img'
					]
				]), ['facility/detail', 'id' => $model->id]); ?>
			</div>
			<div class="col s12 l8">
				<h4 class="light"><?= Html::a(Html::encode($model->title), ['facility/detail', 'id' => $model->id], ['class' => 'black-text']); ?></h4>
				<p><?= Html::a(Html::encode($model->place->title),'#'); ?></p>
				<?= Html::a('<i class="mdi-navigation-arrow-forward right"></i>Detaily ubytování', ['facility/detail', 'id' => $model->id], [
					'class' => 'btn waves-effect waves-light'
				]); ?>
			</div>
		</div>
	</div>
<?php endif; ?>