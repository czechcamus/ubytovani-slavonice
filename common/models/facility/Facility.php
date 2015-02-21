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
 * @property string $certificate
 * @property integer $stars
 * @property string $description
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property FacilityType $facilityType
 * @property PlaceType $placeType
 * @property FacilityFacilityProperty[] $facilityFacilityProperties
 * @property FacilityProperty[] $facilityProperties
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
            [['subject_id', 'person_id', 'partner', 'place_type_id', 'facility_type_id', 'stars', 'created_by', 'updated_by'], 'integer'],
            [['title', 'city', 'postal_code'], 'required'],
            [['checkin_from', 'checkin_to', 'checkout_from', 'checkout_to', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['title', 'weburl', 'certificate'], 'string', 'max' => 100],
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
    public function getPlaceType()
    {
        return $this->hasOne(PlaceType::className(), ['id' => 'place_type_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFacilityFacilityProperties()
	{
		return $this->hasMany(FacilityFacilityProperty::className(), ['facility_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFacilityProperties()
	{
		return $this->hasMany(FacilityProperty::className(), ['id' => 'facility_property_id'])->via('facilityFacilityProperties');
	}
}