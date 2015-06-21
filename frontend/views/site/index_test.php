<?php
/* @var $this yii\web\View */
use frontend\assets\HomeAsset;

/* @var $searchModel frontend\models\FacilitySearchForm */

$this->title = 'úvod';

HomeAsset::register($this);
?>

<div id="index-banner" class="parallax-container">
	<div class="parallax"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/slavonice2.jpg" alt="obrázek - Slavonice"></div>
</div>
<div class="section white">
	<div class="row container">
		<h2 class="header">Parallax</h2>
		<p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
	</div>
</div>