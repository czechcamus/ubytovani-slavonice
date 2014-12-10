<?php

namespace common\models\subject;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
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
 *
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

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => function ($event) {
                    return date('Y-m-d H:i:s');
                },
            ],
            'blame' => BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_type_id', 'created_by', 'updated_by', 'state_id'], 'integer'],
            [['city', 'postal_code'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
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
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'state_id' => Yii::t('app', 'State ID'),
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
}
