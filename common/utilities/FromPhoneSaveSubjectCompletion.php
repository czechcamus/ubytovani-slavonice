<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.2.2015
 * Time: 16:35
 */

namespace common\utilities;

use common\models\Phone;
use common\models\subject\Person;
use yii\db\ActiveRecord;

class FromPhoneSaveSubjectCompletion extends SaveSubjectCompletion {

	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_AFTER_INSERT => 'callSaveSubjectCompletion',
			ActiveRecord::EVENT_AFTER_DELETE => 'callSaveSubjectCompletion'
		];
	}

	public function callSaveSubjectCompletion() {
		/* @var Phone $phone */
		$phone = $this->owner;
		$person = Person::findOne($phone->person_id);
		$this->saveSubjectCompleted($person->subject_id);
	}
}