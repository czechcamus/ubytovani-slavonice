<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 17:26
 */

namespace common\utilities;


use common\models\subject\Subject;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class SaveSubjectCompletion extends Behavior
{
	/** @var integer Id of saved Subject */
	public $subject_id;

	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_AFTER_INSERT => 'saveSubjectCompleted',
			ActiveRecord::EVENT_AFTER_DELETE => 'saveSubjectCompleted'
		];
	}

	/**
	 * Saves subjects completed indicator
	 * @throws \yii\db\Exception
	 */
	public function saveSubjectCompleted() {
		/** @noinspection PhpUndefinedFieldInspection */
		$subject = Subject::findOne($this->subject_id);
		$sql = 'UPDATE subject SET completed = :completed WHERE id = :id';
		$query = Yii::$app->db->createCommand($sql);
		$query->bindValue(':id', $subject->id);
		$query->bindValue(':completed', $subject->checkCompletion() ? 1 : 0);
		$query->execute();
	}
}