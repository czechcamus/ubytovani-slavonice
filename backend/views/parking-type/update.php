<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\type\ParkingType */

$modelClass = Yii::t('back', 'Internet Type');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Parking Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="parking-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
