<?php

use common\models\facility\Facility;
use common\models\facility\Room;
use common\models\PropertyModel;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyType */
/* @var $relation_id \common\models\facility\ObjectProperty */

if ($model->objectProperty->property->property_type == PropertyModel::FACILITY_PROPERTY) {
	$objectModel = Facility::findOne($model->objectProperty->object_id);
	$objectModelClass = Yii::t('back', 'Facilities');
	$indexUrl = ['facility/index'];
	$updateUrl = ['facility/update', 'id' => $model->objectProperty->object_id];
} else {
	$objectModel = Room::findOne($model->objectProperty->object_id);
	$objectModelClass = Yii::t('back', 'Rooms');
	$indexUrl = ['room/index'];
	$updateUrl = ['room/update', 'id' => $model->objectProperty->object_id];
}
$modelClass = Yii::t('back', 'Object Property Type');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', '{objectModelClass}', compact('objectModelClass')), 'url' => $indexUrl];
$this->params['breadcrumbs'][] = ['label' => $objectModel->title, 'url' => $updateUrl];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-property-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'relation_id')) ?>

</div>
