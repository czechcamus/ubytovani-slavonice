<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Subject */
/* @var $form yii\bootstrap\ActiveForm */
//TODO: místo odpovědné osoby, kontaktní osoby
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_nr')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'tax_nr')->textInput(['maxlength' => 14]) ?>

    <?php if (!$model->isNewRecord): ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <h2><?= Yii::t('back', 'Responsible People'); ?></h2>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ActiveDataProvider([
                        'query' => $model->getPeople(),
                        'pagination' => false
                    ]),
                    'columns' => [
                        [
                            'label' => Yii::t('back', 'Person Type'),
                            'value' => function ($data) {
                                return $data->personType->title;
                            },
                        ],
                        'name',
                        'surname',
                        [
                            'class' => \yii\grid\ActionColumn::className(),
                            'controller' => 'person',
                            'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
                                Yii::t('back', 'Add new'), ['person/create', 'relation_id' => $model->id]),
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->subject_id, [
                                        'title' => Yii::t('back', 'Update'),
                                        'data-pjax' => '0',
                                    ]);
                                }
                            ]
                        ]
                    ]
                ]); ?>

                <h2><?= Yii::t('back', 'Contact addresses'); ?></h2>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ActiveDataProvider([
                        'query' => $model->getAddresses(),
                        'pagination' => false
                    ]),
                    'columns' => [
                        'street',
                        'house_nr',
                        'city',
                        'postal_code',
                        [
                            'class' => \yii\grid\ActionColumn::className(),
                            'controller' => 'address',
                            'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
                                Yii::t('back', 'Add new'), ['address/create', 'relation_id' => $model->id]),
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->subject_id, [
                                        'title' => Yii::t('back', 'Update'),
                                        'data-pjax' => '0',
                                    ]);
                                }
                            ]
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>