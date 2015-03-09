<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\property\FacilityProperty */
/* @var $returnUrl string */

$modelClass = Yii::t('back', 'Facility Property');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facility Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'returnUrl')) ?>

</div>
