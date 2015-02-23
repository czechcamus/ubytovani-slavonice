<?php

use common\models\type\PersonType;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Person */
/* @var $form yii\bootstrap\ActiveForm */

$typeList = ArrayHelper::map(PersonType::find()->orderBy('title')->asArray()->all(), 'id', 'title');
?>

<div class="person-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

    <?= $form->field($model, 'person_type_id')->dropDownList($typeList, ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

    <?= $form->field($model, 'front_title')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'back_title')->textInput(['maxlength' => 20]) ?>

    <?php if (!$model->isNewRecord): ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <h2><?= Yii::t('back', 'Phones'); ?></h2>
                <?= GridView::widget([
                    'dataProvider' => new ActiveDataProvider([
                        'query' => $model->getPhones(),
                        'pagination' => false
                    ]),
                    'columns' => [
                        'number',
                        'phoneType.title',
                        [
                            'class' => ActionColumn::className(),
                            'controller' => 'phone',
                            'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;' .
                                Yii::t('back', 'Add new'), ['phone/create', 'relation_id' => $model->id]),
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->person_id, [
                                        'title' => Yii::t('back', 'Update'),
                                        'data-pjax' => '0',
                                    ]);
                                },
                                'delete' => function($url, $model) {
	                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&relation_id=' . $model->person_id, [
		                                'title' => Yii::t('back', 'Delete'),
		                                'data-method' => 'post',
		                                'data-confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
		                                'data-pjax' => '0',
	                                ]);
                                }
                            ]
                        ]
                    ]
                ]); ?>

                <h2><?= Yii::t('back', 'Emails'); ?></h2>
                <?= GridView::widget([
                    'dataProvider' => new ActiveDataProvider([
                        'query' => $model->getEmails(),
                        'pagination' => false
                    ]),
                    'columns' => [
                        'address',
                        'emailType.title',
                        [
                            'class' => ActionColumn::className(),
                            'controller' => 'email',
                            'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;' .
                                Yii::t('back', 'Add new'), ['email/create', 'relation_id' => $model->id]),
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->person_id, [
                                        'title' => Yii::t('back', 'Update'),
                                        'data-pjax' => '0',
                                    ]);
                                },
                                'delete' => function($url, $model) {
	                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&relation_id=' . $model->person_id, [
		                                'title' => Yii::t('back', 'Delete'),
		                                'data-method' => 'post',
		                                'data-confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
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
