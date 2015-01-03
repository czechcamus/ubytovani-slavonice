<?php

namespace common\models\facility;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "facility".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property integer $person_id
 * @property integer $partner
 * @property integer $place_type_id
 * @property integer $facility_type_id
 * @property string $title
 * @property string $weburl
 * @property string $street
 * @property string $house_nr
 * @property string $city
 * @property string $postal_code
 * @property string $checkin_from
 * @property string $checkin_to
 * @property string $checkout_from
 * @property string $checkout_to
 * @property integer $internet
 * @property integer $internet_type_id
 * @property string $internet_day_fee
 * @property integer $parking
 * @property integer $parking_type_id
 * @property string $parking_day_fee
 * @property integer $food_in_price
 * @property string $food_in_price_note
 * @property integer $food_optional
 * @property string $food_optional_note
 * @property integer $children
 * @property integer $animals
 * @property integer $no_barriers
 * @property integer $bikers_welcomed
 * @property string $certificate
 * @property integer $stars
 * @property string $description
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property FacilityType $facilityType
 * @property InternetType $internetType
 * @property ParkingType $parkingType
 * @property PlaceType $placeType
 */
class Facility extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'person_id', 'partner', 'place_type_id', 'facility_type_id', 'internet', 'internet_type_id', 'parking', 'parking_type_id', 'food_in_price', 'food_optional', 'children', 'animals', 'no_barriers', 'bikers_welcomed', 'stars', 'created_by', 'updated_by'], 'integer'],
            [['title', 'city', 'postal_code'], 'required'],
            [['checkin_from', 'checkin_to', 'checkout_from', 'checkout_to', 'created_at', 'updated_at'], 'safe'],
            [['internet_day_fee', 'parking_day_fee'], 'number'],
            [['description'], 'string'],
            [['title', 'weburl', 'food_in_price_note', 'food_optional_note', 'certificate'], 'string', 'max' => 100],
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
            'subject_id' => Yii::t('app', 'Subject ID'),
            'person_id' => Yii::t('app', 'Person ID'),
            'partner' => Yii::t('app', 'Partner'),
            'place_type_id' => Yii::t('app', 'Place Type ID'),
            'facility_type_id' => Yii::t('app', 'Facility Type ID'),
            'title' => Yii::t('app', 'Title'),
            'weburl' => Yii::t('app', 'Weburl'),
            'street' => Yii::t('app', 'Street'),
            'house_nr' => Yii::t('app', 'House Nr'),
            'city' => Yii::t('app', 'City'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'checkin_from' => Yii::t('app', 'Checkin From'),
            'checkin_to' => Yii::t('app', 'Checkin To'),
            'checkout_from' => Yii::t('app', 'Checkout From'),
            'checkout_to' => Yii::t('app', 'Checkout To'),
            'internet' => Yii::t('app', 'Internet'),
            'internet_type_id' => Yii::t('app', 'Internet Type ID'),
            'internet_day_fee' => Yii::t('app', 'Internet Day Fee'),
            'parking' => Yii::t('app', 'Parking'),
            'parking_type_id' => Yii::t('app', 'Parking Type ID'),
            'parking_day_fee' => Yii::t('app', 'Parking Day Fee'),
            'food_in_price' => Yii::t('app', 'Food In Price'),
            'food_in_price_note' => Yii::t('app', 'Food In Price Note'),
            'food_optional' => Yii::t('app', 'Food Optional'),
            'food_optional_note' => Yii::t('app', 'Food Optional Note'),
            'children' => Yii::t('app', 'Children'),
            'animals' => Yii::t('app', 'Animals'),
            'no_barriers' => Yii::t('app', 'No Barriers'),
            'bikers_welcomed' => Yii::t('app', 'Bikers Welcomed'),
            'certificate' => Yii::t('app', 'Certificate'),
            'stars' => Yii::t('app', 'Stars'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilityType()
    {
        return $this->hasOne(FacilityType::className(), ['id' => 'facility_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInternetType()
    {
        return $this->hasOne(InternetType::className(), ['id' => 'internet_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkingType()
    {
        return $this->hasOne(ParkingType::className(), ['id' => 'parking_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceType()
    {
        return $this->hasOne(PlaceType::className(), ['id' => 'place_type_id']);
    }
}
