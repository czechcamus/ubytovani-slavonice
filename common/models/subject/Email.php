<?php

namespace common\models\subject;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "email".
 *
 * @property integer $id
 * @property integer $email_type_id
 * @property string $address
 * @property integer $person_id
 *
 * @property Person $person
 * @property EmailType $emailType
 */
class Email extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email_type_id', 'person_id'], 'integer'],
            [['address', 'email_type_id', 'person_id'], 'required'],
            [['address'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email_type_id' => Yii::t('app', 'Email Type ID'),
            'address' => Yii::t('app', 'Address'),
            'person_id' => Yii::t('app', 'Person ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailType()
    {
        return $this->hasOne(EmailType::className(), ['id' => 'email_type_id']);
    }
}
