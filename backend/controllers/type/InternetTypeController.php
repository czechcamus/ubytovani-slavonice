<?php

namespace backend\controllers\type;

use Yii;
use backend\utilities\TypeModelController;

/**
 * InternetTypeController implements the CRUD actions for InternetType model.
 */
class InternetTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\InternetType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'internet-type/index'
		];
	}
}
