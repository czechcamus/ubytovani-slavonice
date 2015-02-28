<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.2.2015
 * Time: 16:35
 */

namespace common\utilities;

use common\models\Address;
use yii\db\ActiveRecord;

class FromAddressSaveSubjectCompletion extends SaveSubjectCompletion {

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
		/* @var Address $phone */
		$address = $this->owner;
		$this->saveSubjectCompleted($address->subject_id);
	}
}