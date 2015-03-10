<?php

namespace common\models\facility;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property integer $room_id
 * @property string $title
 * @property string $fee
 * @property integer $tax_id
 *
 * @property Room $room
 * @property Tax $tax
 */
class Price extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'tax_id'], 'integer'],
            [['title', 'fee', 'tax_id'], 'required'],
            [['fee'], 'number'],
            [['title'], 'string', 'max' => 100]
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
            'title' => Yii::t('app', 'Title'),
            'fee' => Yii::t('app', 'Fee'),
	        'tax_id' => Yii::t('app', 'Tax')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTax() {
		return $this->hasOne(Tax::className(), ['id' => 'tax_id']);
	}
}
