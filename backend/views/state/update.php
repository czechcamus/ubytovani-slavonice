<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\State */

$modelClass = Yii::t('back', 'State');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="state-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
