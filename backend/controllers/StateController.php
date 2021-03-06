<?php

namespace backend\controllers;

use backend\utilities\TypeModelController;
use Yii;

/**
 * StateController implements the CRUD actions for State model.
 */
class StateController extends TypeModelController
{
    public $modelClass = 'common\models\State';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'state/index'
		];
	}
}
