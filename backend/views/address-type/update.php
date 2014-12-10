<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\subject\AddressType */

$this->title = Yii::t('back', 'Update {modelClass}: ', [
    'modelClass' => 'Address Type',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Address Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('back', 'Update');
?>
<div class="address-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
