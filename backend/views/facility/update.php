<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */

$modelClass = Yii::t('back', 'Facility');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="facility-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
