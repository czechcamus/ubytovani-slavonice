<?php
/* @var $this yii\web\View */
/* @var $rooms common\models\facility\Room */

use frontend\components\Prices;
use frontend\components\Properties;
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
		echo "<tr><td>" . $room->nr . "x</td><td>" . trim($room->roomType->title) . ": <a href=\"#modal" . $room->id . "\" class=\"modal-trigger tooltipped\" data-position=\"top\" data-delay=\"50\" data-tooltip=\"". Yii::t('front', 'detailed information of room') . "\">" . $room->title ."</a>";
		echo "<div id=\"modal" . $room->id ."\" class=\"modal  modal-fixed-footer\">\n";
		echo "<div class=\"modal-content\">\n";
		echo "<h4>" . Yii::t('front', 'Room') . ': ' . $room->title . "</h4>\n";
		echo Properties::widget(['properties' => $room->roomProperties]);
		echo Prices::widget(['prices' => $room->prices]);
		echo "</div>\n";
		echo "<div class=\"modal-footer\">\n";
		echo "<a href=\"#!\" class=\"modal-action modal-close waves-light btn-flat\"><i class=\"mdi-navigation-cancel blue-text left\"></i> " . Yii::t('front', 'close') . "</a>\n";
		echo "</div>\n";
		echo "</div>\n";
		echo "</td><td>" . $room->bed_nr . "</td></tr>\n";
	}
	?>
	</tbody>
	<tfoot>
		<tr><th colspan="2"><?= Yii::t('front', 'Total beds number'); ?>:</th><th><?= $totalBedNr; ?></th></tr>
	</tfoot>
</table>