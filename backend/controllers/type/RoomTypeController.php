<?php

namespace backend\controllers\type;

use Yii;
use backend\utilities\TypeModelController;

/**
 * RoomTypeController implements the CRUD actions for RoomType model.
 */
class RoomTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\RoomType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'room-type/index'
		];
	}

}