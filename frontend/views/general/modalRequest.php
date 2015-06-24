<?php
/* @var $this yii\web\View */
/* @var $model common\models\facility\Room */
?>

<div id="modal-request" class="modal">
	<div class="modal-content">
		<?php if ($form === true): ?>
			<h4>Modal Header</h4>
			<p>A bunch of text</p>
		<?php else: ?>
			<p>Tady není ale vůbec žádný formulář</p>
		<?php endif; ?>
	</div>
	<div class="modal-footer">
		<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Zavřít wokno</a>
		<?php if ($form === true): ?>
			<a href="#" class="modal-action waves-effect waves-green btn-flat">Poslat to dál</a>
		<?php endif; ?>
	</div>
</div>