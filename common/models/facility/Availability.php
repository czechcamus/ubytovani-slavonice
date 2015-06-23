<?php

namespace common\models\facility;

use common\utilities\DateTimeDbConversion;
use Yii;
use yii\db\ActiveRecord;

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
class Availability extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'availability';
    }

	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'dateTime' => [
				'class' => DateTimeDbConversion::className(),
				'attributes' =>[
					[
						'name' => 'date_from'
					],
					[
						'name' => 'date_to'
					]
				]
			]
		];
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
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
	        ['date_from', 'compare', 'compareValue' => date('Y-m-d', time()+86400), 'operator' => '>='],
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
