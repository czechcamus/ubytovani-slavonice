<?php

use common\models\subject\Subject;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Person */
/* @var $relation_id integer */
/* @var $subjectModel common\models\subject\Subject */
/* @var $returnUrl string */

$subjectModel = Subject::findOne($relation_id);
$modelClass = Yii::t('back', 'Person');
$this->title = Yii::t('back', 'Update {modelClass}: ', compact('modelClass')) . ' ' . $model->name . ' ' . $model->surname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Subjects'), 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = ['label' => $subjectModel->title, 'url' => ['subject/update', 'id' => $subjectModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
