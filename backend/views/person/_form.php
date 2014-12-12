<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Person */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'front_title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'back_title')->textInput(['maxlength' => 20]) ?>

    <?php if (!$model->isNewRecord): ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <h2><?= Yii::t('back', 'Phones'); ?></h2>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ActiveDataProvider([
                        'query' => $model->getPhones(),
                        'pagination' => false
                    ]),
                    'columns' => [
                        'number',
                        'phoneType.title',
                        [
                            'class' => \yii\grid\ActionColumn::className(),
                            'controller' => 'phone',
                            'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;' .
                                Yii::t('back', 'Add new'), ['phone/create', 'relation_id' => $model->id]),
                            'template' => '{update}{delete}',
                        ]
                    ]
                ]); ?>

                <h2><?= Yii::t('back', 'Emails'); ?></h2>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ActiveDataProvider([
                        'query' => $model->getEmails(),
                        'pagination' => false
                    ]),
                    'columns' => [
                        'address',
                        'emailType.title',
                        [
                            'class' => \yii\grid\ActionColumn::className(),
                            'controller' => 'email',
                            'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;' .
                                Yii::t('back', 'Add new'), ['email/create', 'relation_id' => $model->id]),
                            'template' => '{update}{delete}',
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
