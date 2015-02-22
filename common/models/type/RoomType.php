<?php

namespace common\models\type;

use common\models\facility\Room;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
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
class RoomType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::ROOM_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::ROOM_TYPE]);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['room_type_id' => 'id']);
    }
}
