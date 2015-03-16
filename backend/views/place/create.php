<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Place */
/* @var $returnUrl string */

$modelClass = Yii::t('back', 'Place');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
