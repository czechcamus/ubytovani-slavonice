<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 8.3.2015
 * Time: 23:35
 */

namespace backend\utilities;


use common\models\facility\ObjectPropertyFee;
use common\models\facility\ObjectPropertyType;
use common\models\PropertyModel;
use common\models\TypeModel;
use yii\base\Model;

class ObjectForm extends Model
{
	/**
	 * Gets property types related to facility property with given property_id
	 * @param $property_id
	 * @return ObjectPropertyType[]
	 */
	public function getPropertyTypes($property_id) {
		return ObjectPropertyType::find()->where([
			'object_property_id' => $property_id
		]);
	}

	/**
	 * Gets fees related to facility property with given property_id
	 * @param $property_id
	 * @return ObjectPropertyFee[]
	 */
	public function getPropertyFees($property_id) {
		return ObjectPropertyFee::find()->where([
			'object_property_id' => $property_id
		])->orderBy(['value' => SORT_ASC]);
	}

	/**
	 * Check existence of free property types
	 * @param $property_id
	 * @param $object_property_id
	 * @return bool
	 */
	public function existsFreeTypes($property_id, $object_property_id) {
		/** @var PropertyModel $property */
		$property         = PropertyModel::findOne($property_id);
		$types_count      = TypeModel::find()->where(['model_type' => $property->model_type])->count();
		$used_types_count = ObjectPropertyType::find()->where(['object_property_id' => $object_property_id])->count();

		return $types_count > $used_types_count;
	}
}