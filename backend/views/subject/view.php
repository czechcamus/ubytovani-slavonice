<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Subject */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('back', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('back', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('back', 'Are you sure you want to delete this item and his all subitems?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'note:ntext',
            [
                'label' => Yii::t('back', 'People'),
                'format' => 'html',
                'value' => $model->renderPeople(),
            ],
            [
                'label' => Yii::t('back', 'Addresses'),
                'format' => 'html',
                'value' => $model->renderAddresses(),
            ],
            'company_nr',
            'tax_nr',
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
            ],
            [
                'attribute' => 'created_by',
                'value' => $model->creator->username,
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'datetime',
            ],
            [
                'attribute' => 'updated_by',
                'value' => $model->updater->username,
            ],
        ],
    ]) ?>

</div>
