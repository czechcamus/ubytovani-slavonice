<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$modelClass = Yii::t('back', 'Facility Property');
$this->title = Yii::t('back', 'Facility Properties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Facility Property',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'note',
	        'fee',
	        'fee_note',

            [
	            'class' => 'yii\grid\ActionColumn',
	            'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
