<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\AddressType */

$modelClass = Yii::t('back', 'typ adresy');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Address Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
