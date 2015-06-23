<?php
/* @var $this yii\web\View */
/* @var $prices common\models\facility\Price */

echo '<table>';
foreach ( $prices as $price ) {
	echo '<tr><td>' . $price->title . ':</td><td class="right-align width-30proc"><strong>' . $price->fee . '</strong> ' . Yii::t('front', 'CZK') . '<br /><em>(' . Yii::t('front', 'incl. VAT') . ' ' . Yii::$app->formatter->asInteger($price->tax->tax_value) . '%)</em></td></tr>';
}
echo '</table>';
