<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('back', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('back', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
	        [
		        'attribute' => 'active',
		        'value' => $model->active ? Yii::t('back', 'Yes') : Yii::t('back', 'No')
	        ],
	        [
		        'attribute' => 'subject_id',
		        'value' => $model->subject->title
	        ],
	        [
		        'attribute' => 'person_id',
		        'value' => $model->person->name . ' ' . $model->person->surname
	        ],
            [
	            'attribute' => 'partner',
	            'value' => $model->partner ? Yii::t('back', 'Yes') : Yii::t('back', 'No')
            ],
	        [
		        'attribute' => 'place_type_id',
		        'value' => $model->place->title
	        ],
	        [
		        'attribute' => 'facility_type_id',
		        'value' => $model->facilityType->title
	        ],
            'title',
            'weburl:url',
            'street',
            'house_nr',
            'city',
            'postal_code',
	        'latitude',
	        'longitude',
	        [
		        'attribute' => 'checkin_from',
		        'format' => 'time'
	        ],
	        [
		        'attribute' => 'checkin_to',
		        'format' => 'time'
	        ],
	        [
		        'attribute' => 'checkout_from',
		        'format' => 'time'
	        ],
	        [
		        'attribute' => 'checkout_to',
		        'format' => 'time'
	        ],
            'certificate',
            'stars',
            'description:ntext',
	        [
		        'attribute' => 'created_at',
		        'format' => 'datetime'
	        ],
	        [
		        'attribute' => 'created_by',
		        'value' => $model->creator->username
	        ],
	        [
		        'attribute' => 'updated_at',
		        'format' => 'datetime'
	        ],
	        [
		        'attribute' => 'updated_by',
		        'value' => $model->updater->username
	        ],
        ],
    ]) ?>
<?php //TODO přidat vlastnosti, pokoje, obrázky ?>
</div>
