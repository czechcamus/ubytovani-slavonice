<?php

namespace backend\controllers\type;

use Yii;
use backend\utilities\TypeModelController;

/**
 * PlaceTypeController implements the CRUD actions for PlaceType model.
 */
class PlaceTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\PlaceType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'place-type/index'
		];
	}
}
