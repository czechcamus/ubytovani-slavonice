<?php

use common\models\type\EmailType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Email */
/* @var $form yii\bootstrap\ActiveForm */

$typeList = ArrayHelper::map(EmailType::find()->orderBy('title')->asArray()->all(), 'id', 'title');
?>

<div class="email-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'email_type_id')->dropDownList($typeList, ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
