<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\Subject */

$this->title = Yii::t('back', 'Create {modelClass}', [
    'modelClass' => Yii::t('back', 'Subject'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
