<?php
/* @var $this yii\web\View */
/* @var $prices common\models\facility\Price */
?>

<p class="prices"><strong><?= Yii::t('front', 'Prices'); ?>:</strong><br />
<?php
foreach ( $prices as $price ) {
	echo $price->title . ': <strong>' . $price->fee . '</strong> ' . Yii::t('front', 'CZK') . ' (' . Yii::t('front', 'incl. VAT') . ' ' . $price->tax->tax_value . '%)<br />';
} ?>
</p>