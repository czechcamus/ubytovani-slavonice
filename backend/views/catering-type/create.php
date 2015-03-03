<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\type\CateringType */

$modelClass = Yii::t('back', 'Catering Type');
$this->title = Yii::t('back', 'Create {modelClass}', compact('modelClass'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('back', 'Facility Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catering-type-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', compact('model')) ?>

</div>