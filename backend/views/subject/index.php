<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\subject\SearchSubject */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('back', 'Subjects');
$this->params['breadcrumbs'][] = $this->title;
$modelClass = Yii::t('back', 'Subject');
?>
<div class="subject-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('back', 'Create {modelClass}', compact('modelClass')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'company_nr',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
