<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */

$modelClass = Yii::t('back', 'Facility');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
