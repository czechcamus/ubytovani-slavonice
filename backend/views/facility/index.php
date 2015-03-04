<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\facility\SearchFacility */
/* @var $dataProvider yii\data\ActiveDataProvider */

$modelClass = Yii::t('back', 'Facility');
$this->title = Yii::t('back', 'Facilities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', compact('modelClass')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
	    'id' => 'facility-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	        'title',
	        [
		        'attribute' => 'facility_type_id',
		        'label' => Yii::t('back', 'Facility Type'),
		        'value' => function($model) {
			        return $model->facilityType->title;
		        }
	        ],
	        [
		        'attribute' => 'subject_id',
		        'label' => Yii::t('back', 'Subject'),
		        'value' => function($model) {
			        return $model->subject->title;
		        }
	        ],
	        [
		        'attribute' => 'place_type_id',
		        'label' => Yii::t('back', 'Place Type'),
		        'value' => function($model) {
			        return $model->placeType->title;
		        }
	        ],
	        [
		        'attribute' => 'partner',
		        'value' => function($model) {
			        return $model->partner ? Yii::t('back', 'Yes') : Yii::t('back', 'No');
		        }
	        ],
	        [
		        'attribute' => 'active',
		        'value' => function($model) {
			        return $model->active ? Yii::t('back', 'Yes') : Yii::t('back', 'No');
		        }
	        ],

            [
	            'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

</div>
