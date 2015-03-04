<?php

namespace common\models\facility;

use common\models\property\RoomProperty;
use common\models\type\RoomType;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $facility_id
 * @property integer $room_type_id
 * @property string $title
 * @property integer $bed_nr
 * @property integer $nr
 * @property string $note
 *
 * @property Price[] $prices
 * @property RoomType $type
 * @property Facility $facility
 * @property ObjectProperty[] $objectProperties
 * @property RoomProperty[] $roomProperties
 */
class Room extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_id', 'room_type_id', 'nr', 'bed_nr'], 'integer'],
            [['title'], 'string', 'max' => 45],
            [['note'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'facility_id' => Yii::t('app', 'Facility'),
            'room_type_id' => Yii::t('app', 'Room Type'),
            'title' => Yii::t('app', 'Title'),
	        'bed_nr' => Yii::t('app', 'Bed Nr.'),
            'nr' => Yii::t('app', 'Nr'),
            'note' => Yii::t('app', 'Note'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['room_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomType()
    {
        return $this->hasOne(RoomType::className(), ['id' => 'room_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getObjectProperties()
	{
		return $this->hasMany(ObjectProperty::className(), ['room_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRoomProperties()
	{
		return $this->hasMany(RoomProperty::className(), ['id' => 'room_property_id'])->via('roomRoomProperties');
	}
}
