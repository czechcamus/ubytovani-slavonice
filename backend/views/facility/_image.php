<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \common\models\facility\Image */
/* @var $key integer */
?>

<div class="col-sm-4 col-md-3">
	<div class="thumbnail">
		<?= Html::img(Yii::getAlias('@web/') . Yii::$app->params['uploadDir'] . '/thumbnails/' . $model->filename, [
			'alt' => Yii::t('back', 'Thumbnail') . ' - ' . Html::encode($model->title)
		]) ?>
		<div class="caption">
			<h4><?= Html::encode($model->title) ?></h4>

			<p>
				<?= Html::checkbox('main[' . $key . ']', $model->main, [
					'label' => Html::tag('strong', Yii::t('back', 'main')),
					'class' => 'main-image-checkbox',
					'data-main-switch-url' => Url::to(['image/main-switch', 'id' => $key, 'relation_id' => $model->facility_id])
				]) ?>
				<span class="pull-right">
					<?= Html::a('<span class="glyphicon glyphicon-pencil"></span>',
						['image/update', 'id' => $key, 'relation_id' => $model->facility_id],
						[
							'title' => Yii::t('back', 'Update'),
						]);
					?>
					<?= Html::a('<span class="glyphicon glyphicon-trash"></span>',
						['image/delete', 'id' => $key, 'relation_id' => $model->facility_id],
						[
							'title'       => Yii::t('back', 'Delete'),
							'data-confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
							'data-method' => 'post'
						]);
					?>
				</span>
			</p>
		</div>
	</div>
</div>