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
			    'id' => 'w4',
			    'class' => 'side-nav'],
		    'items' => $menuItems,
	    ]);
        NavBar::end();
    ?>
    </header>

    <?= $content ?>

    <footer class="page-footer blue">
        <div class="container">
	        <div class="row">
		        <div class="col s12 l8">
			        <form class="contact-form">
				        <div class="row">
					        <div class="col s12">
						        <h5 class="white-text light">Kontaktní formulář:</h5>
					        </div>
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
							<div class="col s12 input-field">
								<i class="mdi-editor-mode-edit prefix"></i>
								<textarea id="message" class="materialize-textarea"></textarea>
								<label for="message" class="blue-text text-lighten-4">Vaše zpráva</label>
							</div>
					        <div class="col s4 white-text">
								X C S a
					        </div>
					        <div class="col s8 input-field">
						        <input id="code" type="text" />
						        <label for="code" class="blue-text text-lighten-4">Opište kód z obrázku</label>
					        </div>
					        <div class="col s12">
						        <button class="btn orange waves-effect waves-light" type="submit" name="action">Odeslat
							        <i class="mdi-content-send right"></i>
						        </button>
					        </div>
				        </div>
			        </form>
		        </div>
		        <div class="col s12 l3 offset-l1">
			        <div class="row white-text">
				        <div class="col s12">
					        <h5 class="light">Provozovatel serveru:</h5>
				        </div>
				        <div class="col s12">
					        <address>
						        Slavonická renesanční o.p.s.<br />
						        Na Potoku 629<br />
						        378 81  Slavonice<br />
						        <i class="mdi-communication-phone"></i> 384 493 884
					        </address>
				        </div>
			        </div>
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

    <?php echo uran1980\yii\widgets\scrollToTop\ScrollToTop::widget(); ?>

    <?php $this->endBody() ?>
</body>
<!-- Chatwoo -->
<script type='text/javascript'>
	function chatwoo_a() {
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.src = 'https://chatwoo.com/c1.jsp?host=' + window.location.host + '&hostname=https://chatwoo.com/' ;
		document.getElementsByTagName('head')[0].appendChild(s);
	}

	function chatwoo_d(r) {
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.src = r.d;
		document.getElementsByTagName('head')[0].appendChild(s);
	}
	chatwoo_a();
</script>
<!-- End of Chatwoo-->
</html>
<?php $this->endPage() ?>
