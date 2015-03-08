<?php

use common\models\facility\Facility;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Room */
/* @var $relation_id integer */
/* @var $facilityModel common\models\facility\Facility */
/* @var $returnUrl string */

$facilityModel = Facility::findOne($relation_id);
$modelClass = Yii::t('back', 'Room');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facility'), 'url' => ['facility/index']];
$this->params['breadcrumbs'][] = ['label' => $facilityModel->title, 'url' => ['facility/update', 'id' => $relation_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', compact('model', 'returnUrl', 'facilityModel')) ?>

</div>
