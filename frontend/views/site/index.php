<?php
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FacilitySearchForm */

use frontend\assets\HomeAsset;
use frontend\components\Facilities;

$this->title = 'úvod';

HomeAsset::register($this);
?>

<div id="index-banner" class="parallax-container">
	<div class="section">
		<div class="container">
			<div class="slider">
				<ul class="slides">
					<?= Facilities::widget([
						'usage' => 'slider',
						'wordsCount' => 20
					]); ?>
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
					<?= Facilities::widget(); ?>
				</div>
			</div>
		</div><!-- end of left column -->
		<div class="col s12 m6">
			<div class="main-event row">
				<div class="col s12 m4">
					<a href="http://www.slavonicefest.cz/"><img src="<?= Yii::$app->homeUrl; ?>images/slavonice-fest-2015.gif" class="responsive-img" /></a>
				</div>
				<div class="col s12 m8">
					<h5 class="light"><a href="http://www.slavonicefest.cz/" class="black-text"><i class="material-icons blue-text left">event</i> Slavonice Fest 2015 se blíží</a></h5>
					<p>Slavonice Fest 2015 odstartuje večer ve čtvrtek 6. srpna a vyvrcholí velkou taneční párty v pondělí 10. srpna 2015!
						Filmy, kapely, DJ´s , léto, pohoda, přátelská atmosféra, Slavonice, Maříž, rakouský Drosendorf  a vy. Těšíme se na vás! <a href="http://www.slavonicefest.cz/"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
			<div class="main-event row">
				<div class="col s12 m4">
					<a href="http://www.slavonice.cz/o-nas/projekty/slavnosti-trojmezi/slavnosti-trojmezi-2014/29,732"><img src="<?= Yii::$app->homeUrl; ?>images/slavnosti-trojmezi.jpg" class="responsive-img" /></a>
				</div>
				<div class="col s12 m8">
					<h5 class="light"><a href="http://www.slavonice.cz/o-nas/projekty/slavnosti-trojmezi/slavnosti-trojmezi-2014/29,732" class="black-text"><i class="material-icons blue-text left">event</i> Slavnosti Trojmezí</a></h5>
					<p>Letošní SLAVNOSTI TROJMEZÍ se odehrávají na několika místech ve SLAVONICÍCH. Zde je popis, jak se na msíta dostat. Pořadatel: spolek Slavonická renesanční společnost, o.s.
						Přijďte, těšíme se na Vás! <a href="http://www.slavonice.cz/o-nas/projekty/slavnosti-trojmezi/slavnosti-trojmezi-2014/29,732"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="material-icons blue-text left">directions_walk</i> Graselovy stezky</a></h6>
					<p>Vydejte se s námi po stezkách místy, kde loupil a skrýval se „grázl“ Johann Georg Grasel. <a href="#"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="material-icons blue-text left">directions_bike</i> Cyklotrasy na Slavonicku</a></h6>
					<p>Můžete si vybrat z několika tématických okruhů i z různých profilů tras. <a href="#"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="material-icons blue-text left">stars</i> Pamětihodnosti v okolí</a></h6>
					<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In dolor elit, pellentesque non velit et, euismod molestie urna. <a href="#"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="material-icons blue-text left">stars</i> Sakrální památky</a></h6>
					<p>Donec malesuada nibh tellus, a imperdiet metus tempor sed. Lorem ipsum dolor sit amet. <a href="#"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
			<div class="info row">
				<div class="col s12">
					<h6 class="light"><a href="#" class="black-text"><i class="material-icons blue-text left">nature</i> Přírodní zajímavosti</a></h6>
					<p>In dolor elit, pellentesque non velit et, euismod molestie urna. Donec malesuada nibh tellus. <a href="#"><i class="material-icons tiny">arrow_forward</i></a></p>
				</div>
			</div>
		</div><!-- end of right column -->
	</div>
</div>