<?php

use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
?>

<?= FileInput::widget([
	'name'          => 'images[]',
	'options'       => [
		'multiple'    => true
	],
	'pluginOptions' => [
		'allowedFileType' => ['image'],
		'msgInvalidFileType' => Yii::t('back', 'Invalid File Type'),
		'allowedFileExtensions' => ['jpg', 'gif', 'png'],
		'msgInvalidFileExtension' => Yii::t('back', 'Invalid Image Type'),
		'uploadUrl'       => Url::to(['facility/file-upload']),
		'uploadExtraData' => [
			'facility_id' => $model->facility_id
		],
		'maxFileCount'    => 10,
		'dropZoneTitle' => Yii::t('back', 'Drag & drop files here …')
	]
]);

//TODO tady budou již nahrané obrázky s možností úprav