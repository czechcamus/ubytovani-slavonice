<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\type\RoomType */
/* @var $returnUrl string */

$modelClass = Yii::t('back', 'Room Type');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Room Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
