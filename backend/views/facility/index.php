<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\facility\SearchFacility */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('back', 'Facilities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Facility',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'subject_id',
            'person_id',
            'partner',
            'place_type_id',
            // 'facility_type_id',
            // 'title',
            // 'weburl:url',
            // 'street',
            // 'house_nr',
            // 'city',
            // 'postal_code',
            // 'checkin_from',
            // 'checkin_to',
            // 'checkout_from',
            // 'checkout_to',
            // 'certificate',
            // 'stars',
            // 'description:ntext',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
