<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\facility\Facility */

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
            'id',
            'subject_id',
            'person_id',
            'partner',
            'place_type_id',
            'facility_type_id',
            'title',
            'weburl:url',
            'street',
            'house_nr',
            'city',
            'postal_code',
            'checkin_from',
            'checkin_to',
            'checkout_from',
            'checkout_to',
            'certificate',
            'stars',
            'description:ntext',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
