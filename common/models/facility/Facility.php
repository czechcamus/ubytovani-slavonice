<?php

namespace common\models\facility;

use common\models\property\FacilityProperty;
use common\models\subject\Person;
use common\models\subject\Subject;
use common\models\type\FacilityType;
use common\models\type\PlaceType;
use common\models\User;
use common\utilities\ObjectsRelationsDelete;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

//TODO dodělat active pole pro možnost vypínání
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
 * @property integer $completed
 * @property integer $active
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property FacilityType $facilityType
 * @property PlaceType $placeType
 * @property ObjectProperty[] $objectProperties
 * @property FacilityProperty[] $facilityProperties
 * @property Room[] $rooms
 * @property Subject $subject
 * @property Person $person
 * @property User $creator
 * @property User $updater
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
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'value' => new Expression('NOW()'),
			],
			'blame' => BlameableBehavior::className(),
			'relationsDelete' => ObjectsRelationsDelete::className()
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'person_id', 'partner', 'place_type_id', 'facility_type_id', 'stars', 'created_by', 'updated_by'], 'integer'],
            [['title', 'city', 'postal_code'], 'required'],
            [['checkin_from', 'checkin_to', 'checkout_from', 'checkout_to', 'created_at', 'updated_at', 'completed'], 'safe'],
	        ['active', 'boolean'],
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
            'subject_id' => Yii::t('app', 'Subject'),
            'person_id' => Yii::t('app', 'Person'),
            'partner' => Yii::t('app', 'Partner'),
            'place_type_id' => Yii::t('app', 'Place Type'),
            'facility_type_id' => Yii::t('app', 'Facility Type'),
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
            'completed' => Yii::t('app', 'Completed'),
            'active' => Yii::t('app', 'Active'),
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
	public function getObjectProperties()
	{
		return $this->hasMany(ObjectProperty::className(), ['object_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFacilityProperties()
	{
		return $this->hasMany(FacilityProperty::className(), ['id' => 'facility_property_id'])->via('objectProperties');
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRooms() {
		return $this->hasMany(Room::className(), ['facility_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSubject() {
		return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPerson() {
		return $this->hasOne(Person::className(), ['id' => 'person_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCreator()
	{
		return $this->hasOne(User::className(), ['id' => 'created_by']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUpdater()
	{
		return $this->hasOne(User::className(), ['id' => 'updated_by']);
	}
}
