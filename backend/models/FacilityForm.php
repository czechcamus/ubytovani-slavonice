<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 14:55
 */

namespace backend\models;


use common\models\type\FacilityType;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class FacilityForm extends Model
{
	/** @var integer */
	public $facility_id;
	/** @var integer */
	public $facility_type_id;
	/** @var string */
	public $title;
	/** @var integer */
	public $subject_id;
	/** @var integer */
	public $person_id;
	/** @var integer */
	public $place_type_id;
	/** @var string */
	public $street;
	/** @var string */
	public $house_nr;
	/** @var string */
	public $city;
	/** @var string */
	public $postal_code;
	/** @var string */
	public $weburl;
	/** @var boolean */
	public $partner;
	/** @var string */
	public $certificate;
	/** @var integer */
	public $stars;
	/** @var string */
	public $checkin_from;
	/** @var string */
	public $checkin_to;
	/** @var string */
	public $checkout_from;
	/** @var string */
	public $checkout_to;
	/** @var string */
	public $description;
	/** @var array */
	public $properties = [];

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['facility_type_id', 'title', 'subject_id', 'person_id', 'place_type_id', 'city', 'postal_code'], 'required'],
			[['facility_id', 'facility_type_id', 'subject_id', 'person_id', 'place_type_id'], 'integer'],
			[['checkin_from', 'checkin_to', 'checkout_from', 'checkout_to'], 'date'],
			['partner', 'boolean'],
			[['title', 'weburl', 'certificate'], 'string', 'max' => 100],
			[['street', 'city'], 'string', 'max' => 45],
			[['house_nr', 'postal_code'], 'string', 'max' => 10],
			[['properties'], 'safe']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'facility_id' =>  Yii::t('back', 'ID'),
			'facility_type_id' => Yii::t('back', 'Facility Type'),
			'title' => Yii::t('back', 'Title'),
			'subject_id' => Yii::t('back', 'Subject'),
			'person_id' => Yii::t('back', 'Person'),
			'place_type_id' => Yii::t('back', 'Place Type'),
			'street' => Yii::t('back', 'Street'),
			'house_nr' => Yii::t('back', 'House Nr.'),
			'city' => Yii::t('back', 'City'),
			'postal_code' => Yii::t('back', 'Postal code'),
			'weburl' => Yii::t('back', 'Web URL'),
			'partner' => Yii::t('back', 'Partner'),
			'certificate' => Yii::t('back', 'Certificate'),
			'stars' => Yii::t('back', 'Stars'),
			'checkin_from' => Yii::t('back', 'Checkin From'),
			'checkin_to' => Yii::t('back', 'Checkin To'),
			'checkout_from' => Yii::t('back', 'Checkout From'),
			'checkout_to' => Yii::t('back', 'Checkout To'),
			'description' => Yii::t('back', 'Description'),
			'properties' => Yii::t('back', 'Properties')
		];
	}

	public function loadModel($id) {
		//TODO dodělat natažení dat
	}

	public function deleteModel() {
		//TODO dodělat smazání dat
	}

	/**
	 * Gets facility types for drop down list
	 * @return array
	 */
	public function getFacilityTypeOptions() {
		return ArrayHelper::map(FacilityType::find()->all(), 'id', 'title');
	}
}