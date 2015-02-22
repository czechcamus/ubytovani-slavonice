<?php

use common\models\subject\Subject;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Address */
/* @var $relation_id integer */
/* @var $subjectModel common\models\subject\Subject */

$subjectModel = Subject::findOne($relation_id);
$modelClass = Yii::t('back', 'Address');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Subjects'), 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = ['label' => $subjectModel->title, 'url' => ['subject/update', 'id' => $relation_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
