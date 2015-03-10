<?php

use common\models\facility\Room;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\facility\Price */
/* @var $returnUrl string */

/* @var $objectModel Room */
$objectModel = Room::findOne($model->room_id);
$facilityModel = $objectModel->facility;
$updateUrl = ['room/update', 'id' => $model->room_id, 'relation_id' => $facilityModel->id];
$modelClass = Yii::t('back', 'Price');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facilities'), 'url' => ['facility/index']];
$this->params['breadcrumbs'][] = ['label' => $facilityModel->title, 'url' => ['facility/update', 'id' => $facilityModel->id]];
$this->params['breadcrumbs'][] = ['label' => $objectModel->title, 'url' => $updateUrl];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
