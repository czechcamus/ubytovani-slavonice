<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\subject\SearchAddress */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('back', 'Addresses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', [
    'modelClass' => 'Address',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'address_type_id',
            'street',
            'house_nr',
            'city',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
