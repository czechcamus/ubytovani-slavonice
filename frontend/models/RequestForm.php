<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RequestForm extends Model
{
    public $roomId;
    public $dateFrom;
    public $dateTo;
    public $note;
    public $name;
	public $email;
	public $phone;
	public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roomId', 'dateFrom', 'dateTo', 'email'], 'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
	        [['note', 'name', 'phone'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roomId' => Yii::t('front', 'Room'),
            'dateFrom' => Yii::t('front', 'Date from'),
            'dateTo' => Yii::t('front', 'Date to'),
            'note' => Yii::t('front', 'Note'),
            'name' => Yii::t('front', 'Name'),
            'email' => Yii::t('front', 'Email'),
            'phone' => Yii::t('front', 'Phone'),
            'verifyCode' => Yii::t('front', 'Verification Code'),
        ];
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
