<?php
use frontend\assets\BaseAsset;
use frontend\models\ContactForm;
use frontend\utilities\materialize\Nav;
use frontend\utilities\materialize\NavBar;
use frontend\utilities\materialize\SideNav;
use yii\helpers\Html;
use yii\web\View;

/* @var $this \yii\web\View */
/* @var $content string */

$session = Yii::$app->session;

BaseAsset::register( $this );
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,400&subset=latin,latin-ext' rel='stylesheet'
	      type='text/css'>
	<?= Html::csrfMetaTags() ?>
	<title><?= Yii::$app->name . ' - ' . Html::encode( $this->title ) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
	<?php
	NavBar::begin( [
		'brandLabel'             => 'Ubytování ve Slavonicích',
		'brandUrl'               => Yii::$app->homeUrl,
		'options'                => [
			'role' => 'navigation',
		],
		'wraperContainerOptions' => [
			'class' => 'nav-wrapper container'
		]
	] );
	$menuItems = [
		[ 'label' => 'Úvod', 'url' => [ '/site/index' ] ],
		[
			'label' => 'Ubytování',
			'items' => [
				[ 'label' => 'Seznam ubytování', 'url' => [ 'facility/index' ] ],
				[ 'label' => 'Druhá položka', 'url' => '#' ],
				[ 'label' => 'Třetí položka', 'url' => '#' ]
			]
		],
		[
			'label' => 'Slavonice',
			'items' => [
				[ 'label' => 'První položka', 'url' => '#' ],
				[ 'label' => 'Druhá položka', 'url' => '#' ],
				[ 'label' => 'Třetí položka', 'url' => '#' ],
				[ 'label' => 'Čtvrtá položka', 'url' => '#' ],
				[ 'label' => 'Pátá položka', 'url' => '#' ],
			]
		],
	];
	echo Nav::widget( [
		'options' => [
			'class' => 'right hide-on-med-and-down'
		],
		'items'   => $menuItems,
	] );
	echo SideNav::widget( [
		'id'    => 'side-menu',
		'items' => $menuItems,
	] );
	NavBar::end();
	?>
</header>

<main>
	<?= $content ?>
</main>

<footer class="page-footer blue">
	<div class="container">
		<div class="row">
			<div class="col s12 l8">
				<?= $this->renderFile('@app/views/general/contactForm.php', [
					'model' => new ContactForm
				]); ?>
			</div>
			<div class="col s12 l3 offset-l1">
				<div class="row white-text">
					<div class="col s12">
						<h5 class="light"><?= Yii::t('front', 'Server operator'); ?>:</h5>
					</div>
					<div class="col s12">
						<address>
							Slavonická renesanční o.p.s.<br/>
							Na Potoku 629<br/>
							378 81 Slavonice<br/>
							<i class="material-icons">phone</i> 384 493 884
						</address>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="right right-align"><?= Yii::powered() ?></div>
			<div>&copy; Slavonická renesanční o.p.s. <?= date( 'Y' ) ?></div>
		</div>
	</div>
</footer>

<?php echo uran1980\yii\widgets\scrollToTop\ScrollToTop::widget(); ?>

<?php $this->endBody() ?>
</body>

<?php if ($session->hasFlash('info')) {
	$this->registerJs("Materialize.toast('" . $session->getFlash('info') . "', 5000, 'orange white-text');", View::POS_LOAD);
} ?>

<!-- Chatwoo -->
<script type='text/javascript'>
	function chatwoo_a() {
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.src = 'https://chatwoo.com/c1.jsp?host=' + window.location.host + '&hostname=https://chatwoo.com/';
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
