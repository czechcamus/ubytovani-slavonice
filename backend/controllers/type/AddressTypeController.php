<?php

namespace backend\controllers\type;

use backend\utilities\TypeModelController;
use Yii;


/**
 * AddressTypeController implements the CRUD actions for AddressType model.
 */
class AddressTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\AddressType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'address-type/index'
		];
	}
}
