<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\property\FacilityProperty */

$modelClass = Yii::t('back', 'Facility Property');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facility Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="facility-property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
