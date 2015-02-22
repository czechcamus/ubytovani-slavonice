<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\type\PersonType */

$modelClass = Yii::t('back', 'Person Type');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Person Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
