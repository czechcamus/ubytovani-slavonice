<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\facility\PlaceType */

$modelClass = Yii::t('back', 'Place Type');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Place Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
