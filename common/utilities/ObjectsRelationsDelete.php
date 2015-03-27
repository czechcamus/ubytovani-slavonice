<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 9.3.2015
 * Time: 9:39
 */

namespace common\utilities;


use common\models\facility\Facility;
use common\models\facility\Price;
use common\models\facility\Room;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class ObjectsRelationsDelete extends Behavior
{
	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_BEFORE_DELETE => 'deleteRelations'
		];
	}

	/**
	 * Deletes Persons relations
	 */
	public function deleteRelations() {
		/** @var Facility|Room $object */
		$object = $this->owner;
		foreach ($object->objectProperties as $objectProperty) {
			$objectProperty->delete();
		}
		if (get_class($object) == Room::className()) {
			Price::deleteAll(['room_id' => $object->id]);
		} else {
			foreach ($object->rooms as $room) {
				$room->delete();
			}
		}
	}
}