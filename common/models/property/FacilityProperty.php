<?php

namespace common\models\property;

use common\models\facility\Facility;
use common\models\facility\ObjectProperty;
use common\models\PropertyModel;
use common\utilities\PropertyTypeAttribute;
use Yii;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property string $title
 * @property integer $model_type
 * @property integer $types
 * @property integer $fees
 */
class FacilityProperty extends PropertyModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => PropertyTypeAttribute::className(),
				'propertyTypeValue' => self::FACILITY_PROPERTY
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['property_type' => self::FACILITY_PROPERTY]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFacilityProperties()
	{
		return $this->hasMany(ObjectProperty::className(), ['property_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFacilities()
	{
		return $this->hasMany(Facility::className(), ['id' => 'object_id'])->via('facilityProperties');
	}

	/**
	 * Types for dropdownlist - according type of property tables
	 * @return array
	 */
	public function getTypeOptions()
	{
		return [
			'' => Yii::t('app', '-- not selected --'),
			self::INTERNET_MODEL => Yii::t('app', 'Type of Internet'),
			self::PARKING_MODEL =>  Yii::t('app', 'Type of Parking')
		];
	}

	/**
	 * Returns title of selected type
	 * @param $id
	 * @return mixed
	 */
	public function getTypeOptionTitle($id)
	{
		$options = $this->getTypeOptions();
		return $options[$id];
	}
}
