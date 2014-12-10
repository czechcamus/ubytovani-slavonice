<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\Phone */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Phone',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
