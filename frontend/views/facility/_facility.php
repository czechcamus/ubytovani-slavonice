<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */
/* @var $index integer */

use frontend\components\FacilityImage;
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>

<div class="<?= ($model->partner ? 'partner-' : ''); ?>facility col s12">
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
			<?php if ($model->partner && ($model->stars > 0)) echo '<span class="rating right orange-text">' . str_repeat('*', $model->stars) . '</span>'; ?>
			<?= Html::tag(($model->partner ? 'h3' : 'h4'),
				Html::a(Html::encode($model->title), ['facility/detail', 'id' => $model->id], ['class' => 'black-text']),
				['class' => 'light']); ?>
			<div class="place"><?= Html::a(Html::encode($model->place->title),'#'); ?></div>
			<?= Html::a('<i class="material-icons right">arrow_forward</i>' . Yii::t('front', 'Details of accommodation'), ['facility/detail', 'id' => $model->id], [
				'class' => 'btn waves-effect waves-light'
			]); ?>
		</div>
	</div>
</div>