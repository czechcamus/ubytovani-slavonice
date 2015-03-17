<?php

use common\models\Place;
use common\models\type\FacilityType;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\facility\FacilitySearch */
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
		        'attribute' => 'facilityTypeTitle',
		        'label' => Yii::t('back', 'Facility Type'),
		        'filter' => FacilityType::getFacilityTypeOptions(),
		        'value' =>  'facilityType.title'
	        ],
	        [
		        'attribute' => 'subjectTitle',
		        'label' => Yii::t('back', 'Subject'),
		        'value' => 'subject.title'
	        ],
	        [
		        'attribute' => 'placeTitle',
		        'label' => Yii::t('back', 'Place'),
		        'filter' => Place::getPlaceOptions(),
		        'value' => 'place.title'
	        ],
	        [
		        'attribute' => 'partner',
		        'filter' => [
			        Yii::t('back', 'No'),
			        Yii::t('back', 'Yes')
		        ],
		        'value' => function($model) {
			        return $model->partner ? Yii::t('back', 'Yes') : Yii::t('back', 'No');
		        }
	        ],
	        [
		        'attribute' => 'active',
		        'filter' => [
			        Yii::t('back', 'No'),
			        Yii::t('back', 'Yes')
		        ],
		        'value' => function($model) {
			        return $model->active ? Yii::t('back', 'Yes') : Yii::t('back', 'No');
		        }
	        ],
			'bedNr',

            [
	            'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

</div>
