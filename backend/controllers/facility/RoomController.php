<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 8.3.2015
 * Time: 19:36
 */

namespace backend\controllers\facility;

use backend\models\RoomForm;
use backend\utilities\BaseModelController;
use Yii;

class RoomController extends BaseModelController
{
	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'facility/update',
			'id' => Yii::$app->request->get('relation_id')
		];
	}

	/**
	 * Creates a new RoomForm model.
	 * @param integer $relation_id of main model
	 * @return mixed
	 */
	public function actionCreate($relation_id)
	{
		$model = new RoomForm();
		$model->scenario = 'create';
		$model->facility_id = $relation_id;

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->saveModel();
			return $this->redirect([
				'update',
				'id' => $model->room_id,
				'relation_id' => $relation_id
			]);
		}

		return $this->render('create', [
			'model' => $model,
			'relation_id' => $relation_id,
			'returnUrl' => $this->getReturnUrl()
		]);
	}

	/**
	 * Updates an existing Room model.
	 * @param integer $id
	 * @param $relation_id
	 * @return mixed
	 */
	public function actionUpdate($id, $relation_id)
	{
		$model = new RoomForm();
		$model->loadModel($id);
		$model->scenario = 'update';

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->saveModel(false);
			$this->refresh();
		}

		return $this->render('update', [
			'model' => $model,
			'relation_id' => $relation_id,
			'returnUrl' => $this->getReturnUrl()
		]);
	}

	/**
	 * Deletes an existing RoomForm model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$model = new RoomForm();
		$model->deleteModel($id);

		return $this->redirect($this->getReturnUrl());
	}
}