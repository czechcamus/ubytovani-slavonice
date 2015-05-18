<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use webmaxx\materialize\Nav;
use webmaxx\materialize\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <?php
        NavBar::begin([
            'brandLabel' => 'Ubytování ve Slavonicích',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'role' => 'navigation',
            ],
            'wraperContainerOptions' => [
	            'class' => 'nav-wrapper container'
            ]
        ]);
        $menuItems = [
            ['label' => 'Úvod', 'url' => ['/site/index']],
            ['label' => 'Ubytování', 'items' => [
	            ['label' => 'První položka', 'url' => '#'],
	            ['label' => 'Druhá položka', 'url' => '#'],
	            ['label' => 'Třetí položka', 'url' => '#']
            ]],
            ['label' => 'Slavonice', 'items' => [
	            ['label' => 'První položka', 'url' => '#'],
	            ['label' => 'Druhá položka', 'url' => '#'],
	            ['label' => 'Třetí položka', 'url' => '#'],
	            ['label' => 'Čtvrtá položka', 'url' => '#'],
	            ['label' => 'Pátá položka', 'url' => '#'],
            ]],
        ];
        echo Nav::widget([
            'options' => [
                'class' => 'right hide-on-med-and-down'],
            'items' => $menuItems,
        ]);
	    echo Nav::widget([
		    'buttonCollapse' => true,
		    'options' => [
			    'id' => 'nav-mobile',
			    'class' => 'side-nav'],
		    'items' => $menuItems,
	    ]);
        NavBar::end();
    ?>

    <div id="index-banner" class="parallax-container">
	    <div class="section">
		    <div class="container">
			    <br /><br />
			    <div class="row">
				    <div class="col s12 m6">
			            <h1><span>Hotel Arkáda</span></h1>
					    <p class="flow-text white-text">Pobyt v Hotelu Arkáda v historické budově přímo na hlavním náměstí je neobyčejným zážitkem i ideální základnou k vychutnání krás Slavonic a České Kanady...</p>
					    <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light">Více informací</a>
				    </div>
				    <div class="col s12 m5 offset-m1">
						<img src="http://nb_projects/ubytovani-slavonice/backend/web/uploads/440621488b927705d1a7bcb2698dbaa2.jpg" class="responsive-img" />
				    </div>
			    </div>
			    <br /><br />
		    </div>
	    </div>
	    <div class="parallax"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/slavonice.jpg" alt="obrázek - Slavonice"></div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Slavonická renesanční o.p.s. <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
