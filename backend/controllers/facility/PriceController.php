<?php

namespace backend\controllers\facility;

use common\models\facility\Room;
use Yii;
use backend\utilities\SubModelController;
use yii\filters\AccessControl;

/**
 * PriceController implements the CRUD actions for Price model.
 */
class PriceController extends SubModelController
{
    public $modelClass = 'common\models\facility\Price';
    public $relationName = 'room';

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

	public function init() {
		parent::init();
		/** @var Room $room */
		$room = Room::findOne(Yii::$app->request->get('relation_id'));
		$this->returnUrlParams = [
			'room/update',
			'id' => $room->id,
			'relation_id' => $room->facility_id
		];
	}
}
