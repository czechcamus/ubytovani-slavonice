<?php

namespace common\models;

use common\models\facility\Room;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property integer $room_id
 * @property string $date_from
 * @property string $date_to
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $note
 * @property integer $settled
 * @property string $settled_note
 * @property string $settled_at
 * @property integer $settled_by
 *
 * @property Room $room
 * @property User $settledBy
 */
class Request extends ActiveRecord
{
	public $verifyCode;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

	//TODO dodělat behaviors

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_from', 'date_to', 'email', 'verifyCode'], 'integer'],
            [['room_id', 'settled'], 'integer'],
            [['note', 'settled_note'], 'string'],
            [['name'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['settled', 'settled_note', 'settled_by', 'settled_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'room_id' => Yii::t('app', 'Room'),
            'date_from' => Yii::t('app', 'Date from'),
            'date_to' => Yii::t('app', 'Date to'),
            'name' => Yii::t('app', 'Your name'),
            'email' => Yii::t('app', 'Your email'),
            'phone' => Yii::t('app', 'Your phone'),
            'note' => Yii::t('app', 'Your note'),
            'settled' => Yii::t('app', 'Settled'),
            'settled_note' => Yii::t('app', 'Note'),
            'settled_at' => Yii::t('app', 'Settled at'),
            'settled_by' => Yii::t('app', 'Settled by'),
            'verifyCode' => Yii::t('front', 'Verification code'),
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
    public function getSettledBy()
    {
        return $this->hasOne(User::className(), ['id' => 'settled_by']);
    }

	/**
	 * Sends an email to the specified email address using the information collected by this model.
	 *
	 * @param  string  $email the target email address
	 * @return boolean whether the email was sent
	 */
	public function sendEmail($email)
	{
		//TODO dodělat ukládání do DB a odeslání správného body
		return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject(Yii::t('front', 'Booking request'))
            ->setTextBody($this->note)
            ->send();
	}
}
