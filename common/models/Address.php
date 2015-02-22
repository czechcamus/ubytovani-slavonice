<?php

namespace common\models;

use common\models\subject\Subject;
use common\models\type\AddressType;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $address_type_id
 * @property string $street
 * @property string $house_nr
 * @property string $city
 * @property string $postal_code
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $state_id
 * @property integer $subject_id
 *
 * @property Subject $subject
 * @property State $state
 * @property AddressType $addressType
 */
class Address extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_type_id', 'subject_id', 'state_id'], 'integer'],
            [['city', 'postal_code', 'address_type_id', 'subject_id', 'state_id'], 'required'],
            [['street', 'city'], 'string', 'max' => 45],
            [['house_nr', 'postal_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address_type_id' => Yii::t('app', 'Address Type ID'),
            'street' => Yii::t('app', 'Street'),
            'house_nr' => Yii::t('app', 'House Nr'),
            'city' => Yii::t('app', 'City'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'state_id' => Yii::t('app', 'State ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddressType()
    {
        return $this->hasOne(AddressType::className(), ['id' => 'address_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}
