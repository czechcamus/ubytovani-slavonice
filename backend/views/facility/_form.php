<?php

use backend\assets\FormFacilityAsset;
use bootui\datetimepicker\Timepicker;
use yii\bootstrap\Button;
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

	<div id="partner-fields">

		<?= $form->field($model, 'certificate')->textInput(['maxlength' => 100]) ?>

		<?= $form->field($model, 'stars')->widget(Spinner::className()) ?>

	    <?= $form->field($model, 'checkin_from')->widget(Timepicker::className()) ?>

	    <?= $form->field($model, 'checkin_to')->widget(Timepicker::className()) ?>

	    <?= $form->field($model, 'checkout_from')->widget(Timepicker::className()) ?>

	    <?= $form->field($model, 'checkout_to')->widget(Timepicker::className()) ?>

	    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<div class="form-group">

			<h4><?= Yii::t('back', 'Facility Properties') ?></h4>

			<?php
			foreach ($model->properties as $property) {
				echo '<div class="col-sm-offset-2 col-sm-8"><div class="checkbox">';
				echo Html::checkbox('properties[' . $property['property_id'] . ']', $property['value'], [
					'label' => $property['property_title'],
					'labelOptions' => [
						'id' => 'property_' . $property['property_id'],
						'class' => 'propertySwitch'
					],
					'onclick' => 'togglePropertyNote(' . $property['property_id'] . ')'
				]);
				echo '<div class="property-details">';
				echo Html::textInput('properties[' . $property['property_id'] . '][property_note]', $property['property_note'], [
					'class' => 'form-control',
					'placeholder' => Yii::t('back', 'Property Note')
				]);
				echo '</div></div></div>';
				if (isset($model->facility_id) && $property['types']) {
					echo '<div class="col-sm-offset-2 col-sm-8">';
                    echo '<strong>' . Yii::t('back', 'Types') . '</strong>';
					echo GridView::widget([
						'dataProvider' => new ActiveDataProvider([
							'query' => $model->getPropertyTypes($property['id']),
							'pagination' => false
						]),
						'columns' => [
							[
								'label' => Yii::t('back', 'Property Type'),
								'value' => function ($data) {
									return $data->type->title;
								},
							],
							[
								'class' => ActionColumn::className(),
								'controller' => 'object-property-type',
								'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
								                    Yii::t('back', 'Add new'), ['object-property-type/create', 'relation_id' => $model->facility_id]),
								'template' => '{update} {delete}',
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
					echo '</div>';
				}
				if (isset($model->facility_id) && $property['fees']) {
					echo '<div class="col-sm-offset-2 col-sm-8">';
					echo '<strong>' . Yii::t('back', 'Types') . '</strong>';
					echo GridView::widget([
						'dataProvider' => new ActiveDataProvider([
							'query' => $model->getFees($property['id']),
							'pagination' => false
						]),
						'columns' => [
							'title',
							'values',
							'tax.tax_value',
							[
								'class' => ActionColumn::className(),
								'controller' => 'fee',
								'header' => Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;' .
								                    Yii::t('back', 'Add new'), ['fee/create', 'relation_id' => $model->facility_id]),
								'template' => '{update} {delete}',
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
					echo '</div>';
				}
			}
			?>
		</div>

	</div>

    <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-8">
            <?= Html::submitButton($model->scenario == 'create' ? Yii::t('back', 'Create') : Yii::t('back', 'Update'), ['class' => $model->scenario == 'create' ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
