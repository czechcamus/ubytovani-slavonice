<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use Yii;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends SubModelController
{
    public $modelClass = 'common\models\Address';
    public $relationName = 'subject';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->urlParams = [
			'subject/update',
			'id' => Yii::$app->request->get('relation_id')
		];
	}
}
