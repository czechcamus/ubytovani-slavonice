<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Phone */

$this->title = Yii::t('back', 'Update {modelClass}: ', [
    'modelClass' => 'Phone',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('back', 'Update');
?>
<div class="phone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
