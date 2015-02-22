<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Price */

$this->title = Yii::t('back', 'Update {modelClass}: ', [
    'modelClass' => 'Price',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('back', 'Update');
?>
<div class="price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
