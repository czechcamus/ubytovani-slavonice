<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel frontend\models\FacilitySearchForm */

use frontend\utilities\materialize\LinkPager;
use yii\widgets\ListView;

$this->title = 'Seznam ubytování';
?>

<div class="section container">
	<div class="row">

		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'options' => [
				'class' => 'col s12 m6'
			],
			'layout' => "{items}\n{pager}\n",
			'pager' => [
				'class' => LinkPager::className()
			],
			'itemView' => '_facility'
		]); ?>

		<div class="col s12 m6">
			<?= $this->renderFile('@app/views/general/facilitySelectForm.php', compact('searchModel')); ?>
		</div>

	</div>
</div>