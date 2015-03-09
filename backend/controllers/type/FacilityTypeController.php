<?php

namespace backend\controllers\type;

use Yii;
use backend\utilities\TypeModelController;

/**
 * FacilityTypeController implements the CRUD actions for FacilityType model.
 */
class FacilityTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\FacilityType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'facility-type/index'
		];
	}
}
