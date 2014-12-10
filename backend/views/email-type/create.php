<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\EmailType */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Email Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Email Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
