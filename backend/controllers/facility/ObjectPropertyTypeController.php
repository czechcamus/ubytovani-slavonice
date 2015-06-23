<?php

namespace backend\controllers\facility;

use backend\utilities\SubModelController;
use common\models\facility\ObjectProperty;
use common\models\facility\ObjectPropertyType;
use common\models\PropertyModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * ObjectPropertyTypeController implements the CRUD actions for ObjectPropertyType model.
 */
class ObjectPropertyTypeController extends SubModelController
{
	public $modelClass = 'common\models\facility\ObjectPropertyType';
	public $relationName = 'object_property';

	/**
	 * Access control etc.
	 * @return array
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'roles' => ['@'],
						'allow' => true
					]
				]
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		/** @var ObjectProperty $objectProperty */
		$this->relationId = \Yii::$app->request->get('object_property_id');
		$objectProperty = ObjectProperty::findOne($this->relationId);
		$controllerName = $objectProperty->object_type == PropertyModel::FACILITY_PROPERTY ? 'facility' : 'room';
		$this->returnUrlParams = [
			$controllerName . '/update',
			'id' => $objectProperty->object_id
		];
		if ($controllerName == 'room')
			$this->returnUrlParams['relation_id'] = $objectProperty->object->facility_id;
	}

	/**
	 * Updates an existing ObjectPropertyType model.
	 *
	 * @param int $object_property_id
	 * @param int|null $type_id
	 *
	 * @return mixed
	 * @throws \yii\web\NotFoundHttpException
	 */
    public function actionUpdate($object_property_id, $type_id)
    {
        $model = $this->findModel($object_property_id, $type_id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect($this->getReturnUrl());

        return $this->render('update', [
	        'model' => $model,
	        'returnUrl' => $this->getReturnUrl()
        ]);
    }

	/**
	 * Deletes an existing ActiveRecord model.
	 *
	 * @param int $object_property_id
	 * @param $type_id
	 *
	 * @return mixed
	 * @throws \Exception
	 * @throws \yii\web\NotFoundHttpException
	 * @internal param int $id
	 */
	public function actionDelete($object_property_id, $type_id)
	{
		$this->findModel($object_property_id, $type_id)->delete();

		return $this->redirect($this->getReturnUrl());
	}

	/**
	 * Finds the ActiveRecord model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param int $object_property_id
	 * @param $type_id
	 *
	 * @return ObjectPropertyType the loaded model
	 * @throws NotFoundHttpException
	 * @internal param int $id
	 */
	protected function findModel($object_property_id, $type_id)
	{
		$model = call_user_func([$this->modelClass, 'findOne'], compact('object_property_id', 'type_id'));
		if (!$model)
			throw new NotFoundHttpException(Yii::t('back', 'The requested page does not exist.'));

		return $model;
	}
}
