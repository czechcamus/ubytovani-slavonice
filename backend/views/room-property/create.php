<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\facility\RoomProperty */

$modelClass = Yii::t('back', 'Room Property');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Room Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
