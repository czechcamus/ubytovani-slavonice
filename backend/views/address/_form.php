<?php

use common\models\State;
use common\models\type\AddressType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Address */
/* @var $form yii\bootstrap\ActiveForm */

$typeList = ArrayHelper::map(AddressType::find()->orderBy('title')->asArray()->all(), 'id', 'title');
$stateList = ArrayHelper::map(State::find()->orderBy('name')->asArray()->all(), 'id', 'name');
?>

<div class="address-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'address_type_id')->dropDownList($typeList, ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'state_id')->dropDownList($stateList, ['prompt' => Yii::t('back', '-- choose a country --')]) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
