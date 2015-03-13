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
		'msgSelected' => Yii::t('back', '{n} files selected'),
		'allowedFileType' => ['image'],
		'msgInvalidFileType' => Yii::t('back', 'Invalid File Type'),
		'allowedFileExtensions' => ['jpg', 'gif', 'png'],
		'msgInvalidFileExtension' => Yii::t('back', 'Invalid Image Type'),
		'maxFileSize' => 2000000,
		'msgSizeTooLarge' => Yii::t('back', 'File "{name}" ({size} KB) exceeds maximum allowed upload size of {maxSize} KB. Please retry your upload!'),
		'msgFilesTooMany' => Yii::t('back', 'Number of files selected for upload ({n}) exceeds maximum allowed limit of {m}. Please retry your upload!'),
		'uploadUrl'       => Url::to(['image/upload']),
		'uploadExtraData' => [
			'facility_id' => $model->facility_id
		],
		'maxFileCount'    => 10,
		'msgValidationError' => Yii::t('back', 'File Upload Error'),
		'browseLabel' => Yii::t('back', 'Browse....'),
		'removeLabel' => Yii::t('back', 'Remove'),
		'removeTitle' => Yii::t('back', 'Clear selected files'),
		'uploadLabel' => Yii::t('back', 'Upload'),
		'uploadTitle' => Yii::t('back', 'Upload selected files'),
		'dropZoneTitle' => Yii::t('back', 'Drag & drop files here …'),
		'fileActionSettings' => [
			'removeTitle' => Yii::t('back', 'Remove file'),
			'uploadTitle' => Yii::t('back', 'Upload file'),
			'indicatorNewTitle' => Yii::t('back', 'Not uploaded yet'),
            'indicatorSuccessTitle' => Yii::t('back', 'Uploaded'),
            'indicatorErrorTitle' => Yii::t('back', 'Upload Error'),
            'indicatorLoadingTitle' => Yii::t('back', 'Uploading ...')
		]
	]
]);

//TODO tady budou již nahrané obrázky s možností úprav (listView)