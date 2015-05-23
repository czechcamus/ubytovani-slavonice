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
    <meta charset="<?= Yii::$app->charset ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,400&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' - ' . Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <header>
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
    </header>

    <div id="index-banner" class="parallax-container">
	    <div class="section">
		    <div class="container">
			    <div class="slider">
				    <ul class="slides">
					    <li>
						    <img src="http://localhost/projekty/ubytovani-slavonice/backend/web/uploads/440621488b927705d1a7bcb2698dbaa2.jpg" class="hide-on-med-and-down" />
						    <div class="caption left-align">
							    <h1><span>Hotel Arkáda</span></h1>
							    <p class="flow-text white-text">Pobyt v Hotelu Arkáda v historické budově přímo na hlavním náměstí je neobyčejným zážitkem i ideální základnou k vychutnání krás Slavonic a České Kanady...</p>
						        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light">Detail ubytování</a>
						    </div>
					    </li>
					    <li>
						    <img src="http://localhost/projekty/ubytovani-slavonice/backend/web/uploads/db8cc72393da98297aafb648dcae230f.jpg" class="hide-on-med-and-down" />
						    <div class="caption center-align">
							    <h1><span>Hotel Besídka</span></h1>
							    <p class="flow-text white-text">Hotel Besídka se nachází v budově z 16. století, která je kulturní památkou. Nabízí moderně zařízené pokoje, restauraci a keramickou dílnu...</p>
							    <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light">Detail ubytování</a>
						    </div>
					    </li>
					    <li>
						    <img src="http://localhost/projekty/ubytovani-slavonice/backend/web/uploads/c97fcd680de7bfd96c5bcbd7a63e0a54.jpg" class="hide-on-med-and-down" />
						    <div class="caption right-align">
							    <h1><span>Hotel U Růže</span></h1>
							    <p class="flow-text white-text">Hotel U Růže se nachází přímo na náměstí a nabízí wellness centrum a nekuřácké pokoje s bezplatným Wi-Fi a satelitní LCD TV...</p>
							    <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light">Detail ubytování</a>
						    </div>
					    </li>
				    </ul>
			    </div>
		    </div>
	    </div>
	    <div class="parallax"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/slavonice2.jpg" alt="obrázek - Slavonice"></div>
    </div>

    <div class="container section">
	    <?= $content ?>
    </div>

    <footer class="page-footer blue">
        <div class="container">
	        <div class="row">
		        <div class="col s12 l8">
			        <form class="contact-form">
				        <div class="row">
					        <div class="col s12">
						        <h5 class="white-text light">Kontaktní formulář:</h5>
					        </div>
				        </div>
				        <div class="row">
					        <div class="col s12 l6 input-field">
						        <i class="mdi-action-account-circle prefix"></i>
								<input id="name" type="text" />
						        <label for="name" class="blue-text text-lighten-4">Vaše jméno</label>
					        </div>
					        <div class="col s12 l6 input-field">
						        <i class="mdi-communication-email prefix"></i>
						        <input id="email" type="email" />
						        <label for="email" class="blue-text text-lighten-4">Váš email</label>
					        </div>
				        </div>
				        <div class="row">
							<div class="col s12 input-field">
								<i class="mdi-editor-mode-edit prefix"></i>
								<textarea id="message" class="materialize-textarea"></textarea>
								<label for="message" class="blue-text text-lighten-4">Vaše zpráva</label>
							</div>
				        </div>
				        <div class="row">
					        <div class="col s4 white-text">
								X C S a
					        </div>
					        <div class="col s8 input-field">
						        <input id="code" type="text" />
						        <label for="code" class="blue-text text-lighten-4">Opište kód z obrázku</label>
					        </div>
				        </div>
				        <div class="row">
					        <div class="col s12">
						        <button class="btn orange waves-effect waves-light" type="submit" name="action">Odeslat
							        <i class="mdi-content-send right"></i>
						        </button>
					        </div>
				        </div>
			        </form>
		        </div>
		        <div class="col s12 l4 center-align">
			        komunikátor
		        </div>
	        </div>
        </div>
	    <div class="footer-copyright">
		    <div class="container">
			    <div class="right right-align"><?= Yii::powered() ?></div>
			    <div>&copy; Slavonická renesanční o.p.s. <?= date('Y') ?></div>
		    </div>
	    </div>
    </footer>

    <a href="#0" class="cd-top"><i class="mdi-navigation-expand-less"></i></a>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
