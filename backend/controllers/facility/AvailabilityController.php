<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.6.2015
 * Time: 16:04
 */

namespace backend\controllers\facility;


use backend\utilities\SubModelController;
use common\models\facility\Room;
use Yii;
use yii\filters\AccessControl;

class AvailabilityController extends SubModelController
{
	public $modelClass = 'common\models\facility\Availability';
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
		$room = Room::findOne( Yii::$app->request->get('relation_id'));
		$this->returnUrlParams = [
			'room/update',
			'id' => $room->id,
			'relation_id' => $room->facility_id
		];
	}
}