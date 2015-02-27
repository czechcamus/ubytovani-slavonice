<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\facility\ObjectPropertyType */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Object Property Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Object Property Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-property-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
