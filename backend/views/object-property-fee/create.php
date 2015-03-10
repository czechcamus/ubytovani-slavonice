<?php
use common\models\facility\Facility;
use common\models\facility\Room;
use common\models\PropertyModel;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyFee */
/* @var $returnUrl string */

if ($model->objectProperty->property->property_type == PropertyModel::FACILITY_PROPERTY) {
	/* @var $objectModel Facility */
	$objectModel = Facility::findOne($model->objectProperty->object_id);
	$updateUrl = ['facility/update', 'id' => $model->objectProperty->object_id];
} else {
	/* @var $objectModel Room */
	$objectModel = Room::findOne($model->objectProperty->object_id);
	$facilityModel = $objectModel->facility;
	$updateUrl = ['room/update', 'id' => $model->objectProperty->object_id, 'relation_id' => $facilityModel->id];
}
$modelClass = Yii::t('back', 'Object Property Fee');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facilities'), 'url' => ['facility/index']];
if (isset($facilityModel))
	$this->params['breadcrumbs'][] = ['label' => $facilityModel->title, 'url' => ['facility/update', 'id' => $facilityModel->id]];
$this->params['breadcrumbs'][] = ['label' => $objectModel->title, 'url' => $updateUrl];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-property-fee-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>