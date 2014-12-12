<?php

namespace common\models\subject;

use Yii;

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
class Phone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_type_id', 'person_id'], 'integer'],
            [['number', 'phone_type_id', 'person_id'], 'required'],
            [['number'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone_type_id' => Yii::t('app', 'Phone Type ID'),
            'number' => Yii::t('app', 'Number'),
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
    public function getPhoneType()
    {
        return $this->hasOne(PhoneType::className(), ['id' => 'phone_type_id']);
    }
}
