<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$modelClass = Yii::t('back', 'Value Added Tax');
$this->title = Yii::t('back', 'Taxes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', compact('modelClass')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tax_value',

            [
	            'class' => 'yii\grid\ActionColumn',
	            'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
