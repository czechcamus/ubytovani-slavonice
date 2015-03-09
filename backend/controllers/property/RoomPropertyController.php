<?php

namespace backend\controllers\property;

use backend\utilities\PropertyModelController;
use Yii;

/**
 * RoomPropertyController implements the CRUD actions for RoomProperty model.
 */
class RoomPropertyController extends PropertyModelController
{
	public $modelClass = 'common\models\property\RoomProperty';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'room-property/index'
		];
	}
}
