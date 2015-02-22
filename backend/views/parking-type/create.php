<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\type\ParkingType */

$modelClass = Yii::t('back', 'Parking Type');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Parking Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
