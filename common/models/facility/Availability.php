<?php

namespace common\models\facility;

use Yii;

/**
 * This is the model class for table "availability".
 *
 * @property integer $id
 * @property integer $room_id
 * @property string $date_from
 * @property string $date_to
 * @property string $description
 *
 * @property Room $room
 */
class Availability extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'availability';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id'], 'integer'],
	        [['date_from', 'date_to'], 'default', 'value' => null],
            [['date_from', 'date_to'], 'required'],
            [['date_from', 'date_to'], 'date'],
	        ['date_to', 'compare', 'compareValue' => Yii::$app->formatter->asDate(time()), 'operator' => '>='],
	        ['date_to', 'compare', 'compareAttribute' => 'date_from', 'operator' => '>='],
            [['description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'room_id' => Yii::t('app', 'Room ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }
}