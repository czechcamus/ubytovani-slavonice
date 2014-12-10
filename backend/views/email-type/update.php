<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\subject\EmailType */

$this->title = Yii::t('back', 'Update {modelClass}: ', [
    'modelClass' => 'Email Type',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Email Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('back', 'Update');
?>
<div class="email-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
