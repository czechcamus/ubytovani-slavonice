<?php

use backend\assets\FormFacilityAsset;
use kartik\datecontrol\DateControl;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\Spinner;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilityForm */
/* @var $form yii\bootstrap\ActiveForm */

FormFacilityAsset::register($this);
?>

<div class="facility-form">

    <?php $form = ActiveForm::begin([
	    'layout' => 'horizontal',
	    'fieldConfig' => Yii::$app->params['fieldConfig']
    ]); ?>

	<?= $form->field($model, 'active')->checkbox() ?>

	<?= $form->field($model, 'facility_type_id')->dropDownList($model->getFacilityTypeOptions()) ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

	<?= $form->field($model, 'subject_id')->dropDownList($model->getSubjectOptions(), [
		'prompt' => Yii::t('back', '-- not selected --'),
		'id' => 'subject-id',
		'data-source-url' => Url::to(['person/get-subject-person-list'])
	]) ?>

    <?= $form->field($model, 'person_id')->dropDownList($model->getPersonOptions(), [
	    'prompt' => Yii::t('back', '-- not selected --'),
	    'id' => 'person-id',
	    'data-value' => $model->person_id
    ]) ?>

	<?= $form->field($model, 'place_type_id')->dropDownList($model->getPlaceTypeOptions()) ?>

	<?= $form->field($model, 'street')->textInput(['maxlength' => 45]) ?>

	<?= $form->field($model, 'house_nr')->textInput(['maxlength' => 10]) ?>

	<?= $form->field($model, 'city')->textInput(['maxlength' => 45]) ?>

	<?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

	<?= $form->field($model, 'weburl')->textInput(['maxlength' => 100]) ?>

	<?= $form->field($model, 'partner')->checkbox(['id' => 'partner-switch']) ?>

	<div id="partner-fields"<?= $model->partner ? ' class="visible"' : ''; ?>>

		<?= $form->field($model, 'certificate')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'stars')->widget(Spinner::className()) ?>

	    <?= $form->field($model, 'checkin_from')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'checkin_to')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'checkout_from')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'checkout_to')->widget(DateControl::classname(), [
		    'type' => DateControl::FORMAT_TIME
	    ]) ?>

	    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<?php if (isset($model->facility_id))
			echo $this->render('_properties', compact('model'));
		?>

	</div>

	<?php if (isset($model->facility_id)) {
		echo '<h2>' . Yii::t('back', 'Rooms') . '</h2>';
		echo GridView::widget([
			'layout' => "{items}",
			'dataProvider' => new ActiveDataProvider([
				'query' => $model->getRooms($model->facility_id)
			]),
			'columns' => [
				'title',
				[
					'label' => Yii::t('back', 'Type'),
					'value' => function ($data) {
						return $data->type->title;
					},
				],
				[
					'class' => ActionColumn::className(),
					'controller' => 'object-property-type',
					'header' => $model->existsFreeTypes($property['property_id'], $property['id']) ? Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
					                                                                                         Yii::t('back', 'Add new'), ['object-property-type/create', 'relation_id' => $property['id']]) : '',
					'template' => $model->existsFreeTypes($property['property_id'], $property['id']) ? '{update} {delete}' : '{delete}',
					'buttons' => [
						'update' => function($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url . '&relation_id=' . $model->object_property_id, [
								'title' => Yii::t('back', 'Update'),
								'data-pjax' => '0',
							]);
						},
						'delete' => function($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url . '&relation_id=' . $model->object_property_id, [
								'title' => Yii::t('back', 'Delete'),
								'data-method' => 'post',
								'data-confirm' => Yii::t('back', 'Are you sure, you want to delete this item?'),
								'data-pjax' => '0',
							]);
						}
					]
				]
			]
		]);
	} ?>

    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->scenario == 'create' ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->scenario == 'create' ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
