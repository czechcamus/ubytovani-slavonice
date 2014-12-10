<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Email */

$this->title = Yii::t('back', 'Update {modelClass}: ', [
    'modelClass' => 'Email',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('back', 'Update');
?>
<div class="email-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
