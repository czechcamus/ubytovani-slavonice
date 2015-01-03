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
 * @property integer $wc
 * @property integer $bath
 * @property integer $douche
 * @property integer $tv
 * @property integer $phone
 *
 * @property Price[] $prices
 * @property RoomType $roomType
 * @property Subject $subject
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
            [['subject_id', 'room_type_id', 'nr', 'wc', 'bath', 'douche', 'tv', 'phone'], 'integer'],
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
            'wc' => Yii::t('app', 'Wc'),
            'bath' => Yii::t('app', 'Bath'),
            'douche' => Yii::t('app', 'Douche'),
            'tv' => Yii::t('app', 'Tv'),
            'phone' => Yii::t('app', 'Phone'),
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
}
