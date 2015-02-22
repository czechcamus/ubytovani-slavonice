<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 0:08
 */

namespace common\utilities;


use common\models\PropertyModel;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class PropertyTypeAttribute extends Behavior
{
	public $propertyTypeValue;

	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_BEFORE_INSERT => 'setPropertyType',
			ActiveRecord::EVENT_BEFORE_UPDATE => 'setPropertyType'
		];
	}

	/**
	 * Sets property_type attribute
	 */
	public function setPropertyType() {
		/** @var PropertyModel $model */
		$model = $this->owner;
		$model->property_type = $this->propertyTypeValue;
	}
}