<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('back', 'Object Property Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-property-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Object Property Type',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'object_property_id',
            'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
