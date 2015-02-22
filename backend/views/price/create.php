<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\facility\Price */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Price',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
