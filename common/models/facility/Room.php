<?php

namespace common\models\facility;

use common\models\subject\Subject;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property integer $room_type_id
 * @property string $title
 * @property integer $nr
 * @property string $note
 *
 * @property Price[] $prices
 * @property RoomType $roomType
 * @property Subject $subject
 * @property RoomRoomProperty[] $roomRoomProperties
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
            [['subject_id', 'room_type_id', 'nr'], 'integer'],
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
            'subject_id' => Yii::t('app', 'Subject ID'),
            'room_type_id' => Yii::t('app', 'Room Type ID'),
            'title' => Yii::t('app', 'Title'),
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
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRoomRoomProperties()
	{
		return $this->hasMany(RoomRoomProperty::className(), ['room_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRoomProperties()
	{
		return $this->hasMany(RoomProperty::className(), ['id' => 'room_property_id'])->via('roomRoomProperties');
	}
}
