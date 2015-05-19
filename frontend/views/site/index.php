<?php
/* @var $this yii\web\View */
$this->title = 'úvod';
?>
<div class="row">
	<div class="col s12 m6">
		<form class="facility-select-form orange">
			<div class="row">
				<div class="col s12">
					<h4 class="white-text light"><i class="mdi-action-search left"></i> Najít ubytování ve Slavonicích</h4>
				</div>
				<div class="col s12 input-field">
					<select class="white-text">
						<option value="1" selected> kdekoli </option>
						<option value="2"> centrum města </option>
						<option value="3"> okraj města </option>
						<option value="4"> centrum obce </option>
						<option value="5"> okraj obce </option>
						<option value="6"> polosamota </option>
						<option value="7"> samota </option>
					</select>
					<label class="orange-text text-lighten-4">Výběr polohy ubytovacího zařízení</label>
				</div>
				<div class="col s12 input-field">
					<select class="white-text">
						<option value="1" selected> cokoli </option>
						<option value="2"> hotel </option>
						<option value="3"> penzion </option>
						<option value="4"> ubytovna </option>
						<option value="5"> privat </option>
						<option value="6"> chalupa </option>
						<option value="7"> chata </option>
					</select>
					<label class="orange-text text-lighten-4">Výběr typu ubytovacího zařízení</label>
				</div>
				<div class="col s12">
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header white-text">rošířené možnosti vyhledávání <i class="mdi-hardware-keyboard-arrow-down"></i></div>
							<div class="collapsible-body white-text">
								<div class="row">
									<div class="col s12">
										<h5 class="light">Požadované vlastnosti ubytovacího zařízení</h5>
									</div>
									<div class="col s12 m6">
										<input type="checkbox" id="no-barriers" />
										<label for="no-barriers" class="white-text">bezbariérovost</label><br />
										<input type="checkbox" id="bikers" />
										<label for="bikers">cyklisté vítáni</label><br />
										<input type="checkbox" id="children" />
										<label for="children">děti</label><br />
										<input type="checkbox" id="animals" />
										<label for="animals">zvířata</label>
									</div>
									<div class="col s12 m6">
										<input type="checkbox" id="internet" />
										<label for="internet">internet</label><br />
										<input type="checkbox" id="food-in-price" />
										<label for="food-in-price">jídlo v ceně</label><br />
										<input type="checkbox" id="food-optional" />
										<label for="food-optional">možnost jídla</label><br />
										<input type="checkbox" id="parking" />
										<label for="parking">parkování</label>
									</div>
								</div>
								<div class="row">
									<div class="col s12">
										<h5 class="light">Požadované vlastnosti pokoje</h5>
									</div>
									<div class="col s12 m6">
										<input type="checkbox" id="room-internet" />
										<label for="room-internet">internet</label><br />
										<input type="checkbox" id="bathroom" />
										<label for="bathroom">koupelna</label><br />
										<input type="checkbox" id="douche" />
										<label for="douche">sprcha</label>
									</div>
									<div class="col s12 m6">
										<input type="checkbox" id="phone" />
										<label for="phone">telefon</label><br />
										<input type="checkbox" id="tv" />
										<label for="tv">TV</label><br />
										<input type="checkbox" id="wc" />
										<label for="wc">WC</label>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<button class="btn waves-effect waves-light" type="submit" name="action">Najít
						<i class="mdi-action-search right"></i>
					</button>
				</div>
			</div>
		</form>
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
	</div><!-- end of right column -->
</div>