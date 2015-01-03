<?php

namespace common\models\facility;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "room_type".
 *
 * @property integer $id
 * @property string $title
 * @property integer $bed_nr
 *
 * @property Room[] $rooms
 */
class RoomType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['bed_nr'], 'integer'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();
        $attributeLabels['bed_nr'] = Yii::t('app', 'Bed Nr');
        return $attributeLabels;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['room_type_id' => 'id']);
    }
}
