<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\State */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'State',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
