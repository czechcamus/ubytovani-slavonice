<?php

namespace common\models\facility;

use common\models\property\RoomProperty;
use common\models\PropertyModel;
use common\models\type\RoomType;
use common\utilities\ObjectsRelationsDelete;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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
 * @property Availability[] $availabilities
 * @property RoomType $roomType
 * @property Facility $facility
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
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'relationsDelete' => ObjectsRelationsDelete::className()
		];
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
	 * Gets rooms options of facility for dropdown field
	 * @param int $facility_id
	 * @return array
	 */
	public function getFacilityRoomOptions($facility_id = 0)
	{
		return ArrayHelper::map(self::findAll(['facility_id' => $facility_id]), 'id', 'title');
	}

	/**
	 * Return the id of the first record
	 * @param int $facility_id
	 * @return integer
	 */
	public function getFacilityRoomFirstId($facility_id = 0) {
		return self::find()->andWhere(['facility_id' => $facility_id])->scalar();
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
	public function getAvailabilities()
	{
		return $this->hasMany(Availability::className(), ['room_id' => 'id']);
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
	public function getRoomProperties()
	{
		return $this->hasMany(ObjectProperty::className(), ['object_id' => 'id'])->where(['object_type' => PropertyModel::ROOM_PROPERTY]);
	}
}
