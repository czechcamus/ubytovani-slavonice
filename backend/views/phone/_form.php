<?php

use common\models\type\PhoneType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Phone */
/* @var $form yii\bootstrap\ActiveForm */

$typeList = ArrayHelper::map(PhoneType::find()->orderBy('title')->asArray()->all(), 'id', 'title');
?>

<div class="phone-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'phone_type_id')->dropDownList($typeList, ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => 15]) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
