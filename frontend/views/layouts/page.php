<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\PageAsset;
use yii\helpers\Html;

PageAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

	<div id="page-banner" class="parallax-container">
		<div class="section container">
			<h1 class="center-align"><span><?= Html::encode($this->title); ?></span></h1>
		</div>
		<div class="parallax"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/slavonice2.jpg" alt="obrázek - Slavonice"></div>
	</div>

	<?= $content ?>

<?php $this->endContent(); ?>