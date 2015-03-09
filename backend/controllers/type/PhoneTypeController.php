<?php

namespace backend\controllers\type;

use backend\utilities\TypeModelController;
use Yii;

/**
 * PhoneTypeController implements the CRUD actions for PhoneType model.
 */
class PhoneTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\PhoneType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'phone-type/index'
		];
	}
}
