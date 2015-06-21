<?php
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FacilitySearchForm */

use frontend\assets\HomeAsset;

$this->title = 'úvod';

HomeAsset::register($this);
?>

<div id="index-banner" class="parallax-container">
	<div class="section">
		<div class="container">
			<div class="slider">
				<ul class="slides">
					<li>
						<img src="<?php echo Yii::$app->request->baseUrl; ?>/ubytovani-slavonice/backend/web/uploads/440621488b927705d1a7bcb2698dbaa2.jpg" class="hide-on-med-and-down" />
						<div class="caption left-align">
							<h1><span>Hotel Arkáda</span></h1>
							<p class="flow-text white-text">Pobyt v Hotelu Arkáda v historické budově přímo na hlavním náměstí je neobyčejným zážitkem i ideální základnou k vychutnání krás Slavonic a České Kanady...</p>
							<a href="http://materializecss.com/getting-started.html" class="btn-large waves-effect waves-light">Detail ubytování</a>
						</div>
					</li>
					<li>
						<img src="<?php echo Yii::$app->request->baseUrl; ?>/ubytovani-slavonice/backend/web/uploads/db8cc72393da98297aafb648dcae230f.jpg" class="hide-on-med-and-down" />
						<div class="caption center-align">
							<h1><span>Hotel Besídka</span></h1>
							<p class="flow-text white-text">Hotel Besídka se nachází v budově z 16. století, která je kulturní památkou. Nabízí moderně zařízené pokoje, restauraci a keramickou dílnu...</p>
							<a href="http://materializecss.com/getting-started.html" class="btn-large waves-effect waves-light">Detail ubytování</a>
						</div>
					</li>
					<li>
						<img src="<?php echo Yii::$app->request->baseUrl; ?>/ubytovani-slavonice/backend/web/uploads/c97fcd680de7bfd96c5bcbd7a63e0a54.jpg" class="hide-on-med-and-down" />
						<div class="caption right-align">
							<h1><span>Hotel U Růže</span></h1>
							<p class="flow-text white-text">Hotel U Růže se nachází přímo na náměstí a nabízí wellness centrum a nekuřácké pokoje s bezplatným Wi-Fi a satelitní LCD TV...</p>
							<a href="http://materializecss.com/getting-started.html" class="btn-large waves-effect waves-light">Detail ubytování</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="parallax"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/slavonice2.jpg" alt="obrázek - Slavonice"></div>
</div>
<div class="container section">
	<div class="row">
		<div class="col s12 m6">
			<?= $this->renderFile('@app/views/general/facilitySelectForm.php', compact('searchModel')); ?>
			<div class="row">
				<div class="col s12 facility-partner">
					<div class="row">
						<div class="col s12 m6 l4">
							<a href="#"><img src="http://localhost/projekty/ubytovani-slavonice/backend/web/uploads/thumbnails/440621488b927705d1a7bcb2698dbaa2.jpg" alt="obrázek - Hotel Arkádia" class="responsive-img" /></a>
						</div>
						<div class="col s12 m6 l8">
							<h5 class="light"><a href="#" class="black-text">Hotel Arkáda</a></h5>
							<p>Pobyt v Hotelu Arkáda v historické budově přímo na hlavním náměstí...</p>
							<a class="waves-effect waves-light btn"><i class="mdi-navigation-arrow-forward right"></i>více</a>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m6 l4">
							<a href="#"><img src="http://localhost/projekty/ubytovani-slavonice/backend/web/uploads/thumbnails/db8cc72393da98297aafb648dcae230f.jpg" alt="obrázek - Hotel Besídka" class="responsive-img" /></a>
						</div>
						<div class="col s12 m6 l8">
							<h5 class="light"><a href="#" class="black-text">Hotel Besídka</a></h5>
							<p>Hotel Besídka se nachází v budově z 16. století, která je kulturní památkou...</p>
							<a class="waves-effect waves-light btn"><i class="mdi-navigation-arrow-forward right"></i>více</a>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m6 l4">
							<a href="#"><img src="http://localhost/projekty/ubytovani-slavonice/backend/web/uploads/thumbnails/c97fcd680de7bfd96c5bcbd7a63e0a54.jpg" alt="obrázek - Hotel U Růže" class="responsive-img" /></a>
						</div>
						<div class="col s12 m6 l8">
							<h5 class="light"><a href="#" class="black-text">Hotel U Růže</a></h5>
							<p>Hotel U Růže se nachází přímo na náměstí a nabízí wellness centrum...</p>
							<a class="waves-effect waves-light btn"><i class="mdi-navigation-arrow-forward right"></i>více</a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end of left column -->
		<div class="col s12 m6">
			<div class="main-event row">
				<div class="col s12 m4">
					<a href="http://www.slavonicefest.cz/"><img src="images/slavonice-fest-2015.gif" class="responsive-img" /></a>
				</div>
				<div class="col s12 m8">
					<h5 class="light"><a href="http://www.slavonicefest.cz/" class="black-text"><i class="mdi-action-event blue-text left"></i> Slavonice Fest 2015 se blíží</a></h5>
					<p>Slavonice Fest 2015 odstartuje večer ve čtvrtek 6. srpna a vyvrcholí velkou taneční párty v pondělí 10. srpna 2015!
						Filmy, kapely, DJ´s , léto, pohoda, přátelská atmosféra, Slavonice, Maříž, rakouský Drosendorf  a vy. Těšíme se na vás! <a href="http://www.slavonicefest.cz/"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
			<div class="main-event row">
				<div class="col s12 m4">
					<a href="http://www.slavonice.cz/o-nas/projekty/slavnosti-trojmezi/slavnosti-trojmezi-2014/29,732"><img src="images/slavnosti-trojmezi.jpg" class="responsive-img" /></a>
				</div>
				<div class="col s12 m8">
					<h5 class="light"><a href="http://www.slavonice.cz/o-nas/projekty/slavnosti-trojmezi/slavnosti-trojmezi-2014/29,732" class="black-text"><i class="mdi-action-event blue-text left"></i> Slavnosti Trojmezí</a></h5>
					<p>Letošní SLAVNOSTI TROJMEZÍ se odehrávají na několika místech ve SLAVONICÍCH. Zde je popis, jak se na msíta dostat. Pořadatel: spolek Slavonická renesanční společnost, o.s.
						Přijďte, těšíme se na Vás! <a href="http://www.slavonice.cz/o-nas/projekty/slavnosti-trojmezi/slavnosti-trojmezi-2014/29,732"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="mdi-maps-directions-walk blue-text left"></i> Graselovy stezky</a></h6>
					<p>Vydejte se s námi po stezkách místy, kde loupil a skrýval se „grázl“ Johann Georg Grasel. <a href="#"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="mdi-maps-directions-bike blue-text left"></i> Cyklotrasy na Slavonicku</a></h6>
					<p>Můžete si vybrat z několika tématických okruhů i z různých profilů tras. <a href="#"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="mdi-maps-local-attraction blue-text left"></i> Pamětihodnosti v okolí</a></h6>
					<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In dolor elit, pellentesque non velit et, euismod molestie urna. <a href="#"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="mdi-maps-local-attraction blue-text left"></i> Sakrální památky</a></h6>
					<p>Donec malesuada nibh tellus, a imperdiet metus tempor sed. Lorem ipsum dolor sit amet. <a href="#"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="mdi-image-nature blue-text left"></i> Přírodní zajímavosti</a></h6>
					<p>In dolor elit, pellentesque non velit et, euismod molestie urna. Donec malesuada nibh tellus. <a href="#"><i class="mdi-navigation-arrow-forward"></i></a></p>
				</div>
			</div>
		</div><!-- end of right column -->
	</div>
</div>