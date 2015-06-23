<?php
/* @var $this yii\web\View */
/* @var $rooms common\models\facility\Room */

use yii\helpers\Html;

?>

<h3 class="light"><?= Yii::t('front', 'Our rooms'); ?></h3>
<table class="rooms striped">
	<thead>
		<tr><th><?= Yii::t('front', 'count'); ?></th><th><?= Yii::t('front', 'description'); ?></th><th><?= Yii::t('front', 'beds'); ?></th></tr>
	</thead>
	<tbody>
	<?php
	$totalBedNr = 0;
	foreach ( $rooms as $room ) {
		$totalBedNr += $room->nr * $room->bed_nr;
		echo "<tr><td>" . $room->nr . "x</td><td>" . trim($room->roomType->title) . ": ";
		echo Html::a($room->title, ['room/detail', 'id' => $room->id], [
				'title' => Yii::t('front', 'detailed information of room')
			]);
		echo "</td><td>" . $room->bed_nr . "</td></tr>\n";
	}
	?>
	</tbody>
	<tfoot>
		<tr><th colspan="2"><?= Yii::t('front', 'Total beds number'); ?>:</th><th><?= $totalBedNr; ?></th></tr>
	</tfoot>
</table>