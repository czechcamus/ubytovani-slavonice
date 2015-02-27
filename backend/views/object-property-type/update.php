<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyType */

$this->title = Yii::t('back', 'Update {modelClass}: ', [
    'modelClass' => 'Object Property Type',
]) . ' ' . $model->object_property_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Object Property Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->object_property_id, 'url' => ['view', 'object_property_id' => $model->object_property_id, 'type_id' => $model->type_id]];
$this->params['breadcrumbs'][] = Yii::t('back', 'Update');
?>
<div class="object-property-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
