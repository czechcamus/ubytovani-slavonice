<?php

namespace backend\controllers\property;

use backend\utilities\PropertyModelController;
use Yii;

/**
 * FacilityPropertyController implements the CRUD actions for FacilityProperty model.
 */
class FacilityPropertyController extends PropertyModelController
{
	public $modelClass = 'common\models\property\FacilityProperty';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'facility-property/index'
		];
	}
}
