<?php
/* @var $this yii\web\View */
/* @var $rooms common\models\facility\Room */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<h3 class="light"><?= Yii::t('front', 'Our rooms'); ?></h3>
<table class="rooms striped">
	<thead>
		<tr><th><?= Yii::t('front', 'description'); ?></th><th><?= Yii::t('front', 'beds'); ?></th><th class="right-align"><?= Yii::t('front', 'prices'); ?></th></tr>
	</thead>
	<tbody>
	<?php
	$totalBedNr = 0;
	foreach ( $rooms as $room ) {
		$totalBedNr += $room->nr * $room->bed_nr;
		echo "<tr><td><em>" . trim($room->roomType->title) . "</em><br />";
		echo $room->nr . "x " . Html::a($room->title, ['room/detail', 'id' => $room->id], [
				'title' => Yii::t('front', 'detailed information of room')
			]);
		$fees = ArrayHelper::getColumn($room->prices, 'fee');
		$minFee = min($fees);
		$maxFee = max($fees);
		echo "</td><td>" . $room->bed_nr . "</td><td class=\"right-align\">" . ($minFee != $maxFee ? $minFee . " - " . $maxFee : $maxFee) . "  " . Yii::t('front', 'CZK') . "</td></tr>\n";
	}
	?>
	</tbody>
	<tfoot>
		<tr><th><?= Yii::t('front', 'Total beds number'); ?>:</th><th colspan="2"><?= $totalBedNr; ?></th></tr>
	</tfoot>
</table>