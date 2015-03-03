<?php

namespace backend\controllers\facility;

use backend\utilities\SubModelController;
use common\models\facility\ObjectPropertyType;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * ObjectPropertyTypeController implements the CRUD actions for ObjectPropertyType model.
 */
class ObjectPropertyTypeController extends SubModelController
{
	public $modelClass = 'common\models\facility\ObjectPropertyType';
	public $relationName = 'object_property';

	/**
	 * Updates an existing ObjectPropertyType model.
	 *
	 * @param int $object_property_id
	 * @param int|null $type_id
	 * @param integer $relation_id
	 *
	 * @return mixed
	 * @throws \yii\web\NotFoundHttpException
	 */
    public function actionUpdate($object_property_id, $type_id, $relation_id)
    {
        $model = $this->findModel($object_property_id, $type_id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->goBack();

        return $this->render('update', compact('model', 'relation_id'));
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
		$session = Yii::$app->session;

		$this->findModel($object_property_id, $type_id)->delete();

		if ($session->has('returnUrl'))
			return $this->redirect($session->get('returnUrl'));

		return $this->goBack();
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
		$model = call_user_func([$this->modelClass, 'findOne'], $object_property_id, $type_id);
		if (!$model)
			throw new NotFoundHttpException(Yii::t('back', 'The requested page does not exist.'));

		return $model;
	}
}
