<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use common\models\subject\Person;
use Yii;


/**
 * PhoneController implements the CRUD actions for Phone model.
 */
class PhoneController extends SubModelController
{
    public $modelClass = 'common\models\Phone';
    public $relationName = 'person';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		/** @var Person $person */
		$person = Person::findOne(Yii::$app->request->get('relation_id'));
		$this->returnUrlParams = [
			'person/update',
			'id' => $person->id,
			'relation_id' => $person->subject_id
		];
	}
}
