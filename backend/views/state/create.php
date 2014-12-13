<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\State */

$modelClass = Yii::t('back', 'State');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
