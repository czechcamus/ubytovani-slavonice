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

class SaveSubjectCompletion extends Behavior
{
	/**
	 * Saves subjects completed indicator
	 * @throws \yii\db\Exception
	 */
	public function saveSubjectCompleted($subject_id) {
		/** @noinspection PhpUndefinedFieldInspection */
		$subject = Subject::findOne($subject_id);
		$sql = 'UPDATE subject SET completed = :completed WHERE id = :id';
		$query = Yii::$app->db->createCommand($sql);
		$query->bindValue(':id', $subject->id);
		$query->bindValue(':completed', $subject->checkCompletion() ? 1 : 0);
		$query->execute();
	}
}