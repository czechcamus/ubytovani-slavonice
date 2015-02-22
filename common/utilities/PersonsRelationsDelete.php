<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.2.2015
 * Time: 21:20
 */

namespace common\utilities;

use common\models\Email;
use common\models\Phone;
use common\models\subject\Person;
use yii\base\Behavior;

class PersonsRelationsDelete extends Behavior
{
	/**
	 * @return array
	 */
	public function events() {
		return [
			Person::EVENT_BEFORE_DELETE => 'deleteRelations'
		];
	}

	/**
	 * Deletes Persons relations
	 */
	public function deleteRelations() {
		/** @var Person $person */
		$person = $this->owner;
		Phone::deleteAll(['person_id' => $person->id]);
		Email::deleteAll(['person_id' => $person->id]);
	}
}