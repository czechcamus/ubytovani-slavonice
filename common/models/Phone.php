<?php

namespace common\models;

use common\models\subject\Person;
use common\models\type\PhoneType;
use common\utilities\FromPhoneSaveSubjectCompletion;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "phone".
 *
 * @property integer $id
 * @property integer $phone_type_id
 * @property string $number
 * @property integer $person_id
 *
 * @property Person $person
 * @property PhoneType $phoneType
 */
class Phone extends ActiveRecord
{

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone';
    }

	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'saveSubjectCompletion' => FromPhoneSaveSubjectCompletion::className()
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_type_id', 'person_id'], 'integer'],
            [['number', 'phone_type_id'], 'required'],
            [['number'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone_type_id' => Yii::t('app', 'Phone Type'),
            'number' => Yii::t('app', 'Number'),
            'person_id' => Yii::t('app', 'Person'),
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
    public function getPhoneType()
    {
        return $this->hasOne(PhoneType::className(), ['id' => 'phone_type_id']);
    }
}
