<?php

namespace backend\controllers\type;

use Yii;
use backend\utilities\TypeModelController;

/**
 * PersonTypeController implements the CRUD actions for PersonType model.
 */
class PersonTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\PersonType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'person-type/index'
		];
	}
}
