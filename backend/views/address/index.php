<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('back', 'Addresses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Address',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'address_type_id',
            'street',
            'house_nr',
            'city',
            // 'postal_code',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'state_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
