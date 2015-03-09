<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\type\PhoneType */
/* @var $returnUrl string */

$modelClass = Yii::t('back', 'Phone Type');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Phone Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
