<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use Yii;
use yii\filters\AccessControl;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends SubModelController
{
    public $modelClass = 'common\models\Address';
    public $relationName = 'subject';

	/**
	 * Access control etc.
	 * @return array
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'roles' => ['@'],
						'allow' => true
					]
				]
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'subject/update',
			'id' => Yii::$app->request->get('relation_id')
		];
	}
}
