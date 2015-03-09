<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use common\models\subject\Person;
use Yii;


/**
 * EmailController implements the CRUD actions for Email model.
 */
class EmailController extends SubModelController
{
    public $modelClass = 'common\models\Email';
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
