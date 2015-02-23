<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Facility',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
