<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\subject\Email */
/* @var $relation_id integer id of Person model */
/* @var $personModel common\models\subject\Person */
/* @var $subjectModel common\models\subject\Subject */

$modelClass = Yii::t('back', 'Email');
$personModel = \common\models\subject\Person::findOne($relation_id);
$subjectModel = \common\models\subject\Subject::findOne($personModel->subject_id);
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Subjects'), 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = ['label' => $subjectModel->title, 'url' => ['subject/update', 'id' => $subjectModel->id]];
$this->params['breadcrumbs'][] = ['label' => $personModel->name . ' ' . $personModel->surname, 'url' => ['person/update', 'id' => $relation_id, 'relation_id' => $personModel->subject_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
