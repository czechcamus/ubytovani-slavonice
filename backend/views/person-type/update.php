<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\type\PersonType */
/* @var $returnUrl string */

$modelClass = Yii::t('back', 'Person Type');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Person Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="person-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
