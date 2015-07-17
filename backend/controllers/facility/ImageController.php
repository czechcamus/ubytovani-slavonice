<?php

namespace backend\controllers\facility;

use backend\utilities\SubModelController;
use common\models\facility\Image;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends SubModelController
{
	public $modelClass = 'common\models\facility\Image';
	public $relationName = 'facility';

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
	 * Uploads and saves images
	 * @return \common\components\Response
	 */
	public function actionUpload() {
		$response = Yii::$app->response;
		$response->format = Response::FORMAT_JSON;

		$facility_id = Yii::$app->request->post('facility_id');
		if (!$facility_id) {
			$response->data = [
				'error' => Yii::t('back', 'Error - No facility ID given!')
			];
			return $response;
		}

		if (empty($_FILES['images'])) {
			$response->data = [
				'error'	=> Yii::t('back', 'Error - No images selected!')
			];
			return $response;
		}

		$images = $_FILES['images'];
		for ($i = 0; $i < count($images['name']); $i++) {
			$model = new Image();
			if ($model->storeImage($facility_id, $images['name'][$i], $images['tmp_name'][$i])) {
				$response->data = [];
			} else {
				$response->data = [
					'error'	=> Yii::t('back', 'Error - Upload images not successfull!')
				];
				break;
			}
		}

		return $response;
	}

	/**
	 * Updates main attributes according user selection
	 * @param $id
	 * @param $relation_id
	 */
	function actionMainSwitch($id, $relation_id) {
		/** @var Image $model */
		$model = Image::findOne($id);
		$model->main = 1;
		$model->save(false);

		Image::updateAll(['main' => 0],	[
			'and', ['not', ['id' => $id]], ['facility_id' => $relation_id]
		]);
	}
}
