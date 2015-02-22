<?php

namespace common\models\facility;

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
	public function getRoomProperties()
	{
		return $this->hasMany(ObjectProperty::className(), ['property_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRooms()
	{
		return $this->hasMany(Room::className(), ['id' => 'object_id'])->via('roomProperties');
	}
}
