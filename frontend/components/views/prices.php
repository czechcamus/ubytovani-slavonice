<?php
/* @var $this yii\web\View */
/* @var $prices common\models\facility\Price */

echo '<table>';
foreach ( $prices as $price ) {
	echo '<tr><td>' . $price->title . ':</td><td class="right-align width-3
	20proc"><strong>' . $price->fee . '</strong> ' . Yii::t('front', 'CZK') . '</td></tr>';
}
echo '</table>';
