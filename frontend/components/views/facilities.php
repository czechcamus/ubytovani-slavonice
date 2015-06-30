<?php
/* @var $this yii\web\View */
/* @var $facilities common\models\facility\Facility */
/* @var $usage string */
/* @var $wordsCount integer */

use frontend\components\FacilityImage;
use yii\helpers\Html;
use yii\helpers\StringHelper;

$captionPosition = ['left',	'center', 'right'];
$i = 0;
foreach ( $facilities as $facility ) {
	if ($usage == 'index') {
		echo '<div class="row">';
			echo '<div class="col s12 m6 l4">';
				echo Html::a(FacilityImage::widget([
					'facilityId' => $facility->id,
					'thumbnail' => true,
					'options' => [
						'class' => 'responsive-img'
					]
				]), ['facility/detail', 'id' => $facility->id]);
			echo '</div>';
			echo '<div class="col s12 m6 l8">';
				echo '<h5 class="light">' . Html::a($facility->title, ['facility/detail', 'id' => $facility->id], [
						'class' => 'black-text'
					]) . '</h5>';
				echo '<p>' . StringHelper::truncateWords($facility->description, $wordsCount) . '</p>';
				echo Html::a('<i class="material-icons tiny right">arrow_forward</i>' . Yii::t('front', 'Details'), ['facility/detail', 'id' => $facility->id], [
					'class' => 'waves-effect waves-light btn'
				]);
			echo '</div>';
		echo '</div>';
	} elseif ($usage == 'slider') {
		echo '<li>';
			echo FacilityImage::widget([
				'facilityId' => $facility->id,
				'thumbnail' => false,
				'options' => [
					'class' => 'responsive-hide-on-med-and-down'
				]
			]);
			echo '<div class="caption '. $captionPosition[$i] . '-align">';
				echo '<h1><span class="black-text">' . $facility->title . '</span></h1>';
				echo '<p class="flow-text white-text">' . StringHelper::truncateWords($facility->description, $wordsCount) . '</p>';
				echo Html::a('<i class="material-icons tiny right">arrow_forward</i>' . Yii::t('front', 'Details of facility'), ['facility/detail', 'id' => $facility->id], [
					'class' => 'waves-effect waves-light btn-large'
				]);
			echo '</div>';
		echo '</li>';
	}
	if (++$i == 3) $i = 0;
}