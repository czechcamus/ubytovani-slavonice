<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 26.2.2015
 * Time: 20:34
 */

namespace common\utilities;


use common\models\facility\ObjectProperty;
use common\models\facility\ObjectPropertyFee;
use common\models\facility\ObjectPropertyType;
use yii\base\Behavior;

class ObjectPropertysRelationsDelete extends Behavior
{
	/**
	 * @return array
	 */
	public function events() {
		return [
			ObjectProperty::EVENT_BEFORE_DELETE => 'deleteRelations'
		];
	}

	/**
	 * Deletes Object property relations
	 * @throws \Exception
	 */
	public function deleteRelations() {
		/** @var ObjectProperty $objectProperty */
		$objectProperty = $this->owner;
		ObjectPropertyType::deleteAll(['object_property_id' => $objectProperty->id]);
		ObjectPropertyFee::deleteAll(['object_property_id' => $objectProperty->id]);
	}
}