<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\Email */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Email',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
