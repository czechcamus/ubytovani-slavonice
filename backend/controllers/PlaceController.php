<?php

namespace backend\controllers;

use backend\utilities\TypeModelController;
use Yii;

/**
 * PlaceController implements the CRUD actions for Place model.
 */
class PlaceController extends TypeModelController
{
	public $modelClass = 'common\models\Place';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'place/index'
		];
	}
}
