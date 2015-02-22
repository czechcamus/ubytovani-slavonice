<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.2.2015
 * Time: 22:05
 */

namespace common\utilities;


use common\models\Address;
use common\models\subject\Subject;
use yii\base\Behavior;

class SubjectsRelationsDelete extends Behavior
{
	/**
	 * @return array
	 */
	public function events() {
		return [
			Subject::EVENT_BEFORE_DELETE => 'deleteRelations'
		];
	}

	/**
	 * Deletes Subjects relations
	 * @throws \Exception
	 */
	public function deleteRelations() {
		/** @var Subject $subject */
		$subject = $this->owner;
		foreach ($subject->people as $person) {
			$person->delete();
		}
		Address::deleteAll(['subject_id' => $subject->id]);
	}
}