<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Tax */
/* @var $returnUrl string */

$modelClass = Yii::t('back', 'Value Added Tax');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->tax_value . ' %';
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Taxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $modelClass . ' ' . $model->tax_value . ' %';
?>
<div class="tax-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
