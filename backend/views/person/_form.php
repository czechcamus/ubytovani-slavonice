<?php

use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\subject\Person */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $returnUrl string */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">

		<div class="col-sm-12 col-md-6">

			<?= $form->field($model, 'person_type_id')->dropDownList($model->getPersonTypeOptions(), ['prompt' => Yii::t('back', '-- choose a type --')]) ?>

		    <?= $form->field($model, 'front_title')->textInput(['maxlength' => 20]) ?>

		    <?= $form->field($model, 'name')->textInput(['maxlength' => 30]) ?>

		    <?= $form->field($model, 'surname')->textInput(['maxlength' => 30]) ?>

		    <?= $form->field($model, 'back_title')->textInput(['maxlength' => 20]) ?>

		</div>

		<div class="col-sm-12 col-md-6">

		    <?php if (!$model->isNewRecord): ?>
                <h2><?= Yii::t('back', 'Phones'); ?></h2>
                <?= GridView::widget([
	                'layout' => "{items}",
                    'dataProvider' => new ActiveDataProvider([
                        'query' => $model->getPhones()
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
	                'layout' => "{items}",
                    'dataProvider' => new ActiveDataProvider([
                        'query' => $model->getEmails()
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
		    <?php endif; ?>

		</div>

	</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('back', 'Save'), [
	        'class' => 'btn btn-primary'
        ]) ?>
        <?= Html::submitButton(Yii::t('back', 'Close'), [
	        'id' => 'cancel-btn',
	        'class' => 'btn btn-warning',
	        'data-cancel-url' => $returnUrl
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
