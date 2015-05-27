<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */

use yii\helpers\Html;
use yii\helpers\StringHelper;

?>

<div class="<?php echo ($model->partner ? 'partner-' : ''); ?>facility row">
	<div class="col s12 l4">
		obrázek
	</div>
	<div class="col s12 l8">
		<p class="right"><?= Html::a(Html::encode($model->place->title),'#'); ?></p>
		<h3 class="light"><?= Html::a(Html::encode($model->title), ['facility/detail', 'id' => $model->id], ['class' => 'black-text']); ?></h3>
		<?php if ($model->stars > 0) echo '<span class="stars orange-text">' . str_repeat('<i class="mdi-action-grade"></i>', $model->stars) . '</span>'; ?>
		<p><?= StringHelper::truncateWords(Html::encode($model->description), 30); ?></p>
		<?= Html::a('<i class="mdi-navigation-arrow-forward right"></i>Detail ubytování', ['facility/detail', 'id' => $model->id], [
			'class' => 'btn waves-effect waves-light'
		]); ?>
	</div>
</div>
