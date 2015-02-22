<?php

namespace backend\controllers;

use common\models\facility\InternetType;
use common\models\facility\ParkingType;
use Faker\Provider\sk_SK\Internet;
use Yii;
use common\models\facility\FacilityProperty;
use yii\data\ActiveDataProvider;
use backend\utilities\TypeModelController;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * FacilityPropertyController implements the CRUD actions for FacilityProperty model.
 */
class FacilityPropertyController extends TypeModelController
{
	public $modelClass = 'common\models\facility\FacilityProperty';

	/**
	 * Returns dropdown type list options in JSON format
	 * @return \yii\web\Response|Response
	 */
	public function actionTypeListOptions()
	{
		$tid = Yii::$app->request->get('tid');
		$items = $this->getTypeItems($tid);

		$response = Yii::$app->response;
		$response->format = Response::FORMAT_JSON;
		$response->data = $items;
		return $response;
	}

	/**
	 * Type items for drop down list
	 * @param string $tid
	 * @return array
	 */
	protected function getTypeItems($tid)
	{
		$items = [];
		if ($tid == 'internet')
			$items = InternetType::find()->all();
		else if ($tid == 'parking')
			$items = ParkingType::find()->all();
		return ArrayHelper::map($items, 'id', 'title');
	}
}
