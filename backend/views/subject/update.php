<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Subject */

$modelClass = Yii::t('back', 'Subject');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
