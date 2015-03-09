<?php

namespace backend\controllers\type;

use Yii;
use backend\utilities\TypeModelController;

/**
 * ParkingTypeController implements the CRUD actions for ParkingType model.
 */
class ParkingTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\ParkingType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'parking-type/index'
		];
	}
}
