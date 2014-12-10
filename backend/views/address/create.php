<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\Address */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Address',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
