<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\PhoneType */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Phone Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Phone Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
