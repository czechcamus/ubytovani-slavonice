<?php

namespace common\models\property;

use common\models\facility\ObjectProperty;
use common\models\facility\Room;
use common\models\PropertyModel;
use common\utilities\PropertyTypeAttribute;
use Yii;

/**
 * This is the model class for table "room_property".
 *
 * @property integer $id
 * @property string $title
 * @property integer $model_type
 * @property integer $types
 * @property integer $fees
 *
 * @property ObjectProperty[] $objectProperties
 * @property Room[] $rooms
 */
class RoomProperty extends PropertyModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => PropertyTypeAttribute::className(),
				'propertyTypeValue' => self::ROOM_PROPERTY
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['property_type' => self::ROOM_PROPERTY]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getObjectProperties()
	{
		return $this->hasMany(ObjectProperty::className(), ['property_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRooms()
	{
		return $this->hasMany(Room::className(), ['id' => 'object_id'])->via('objectProperties');
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
