<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 14:55
 */

namespace backend\models;


use common\models\facility\Facility;
use common\models\subject\Subject;
use common\models\subject\Person;
use common\models\type\FacilityType;
use common\models\type\PlaceType;
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
			[['title', 'subject_id', 'person_id', 'city', 'postal_code'], 'required', 'on' => ['create', 'update']],
			[['facility_id', 'facility_type_id', 'subject_id', 'person_id', 'place_type_id'], 'integer', 'on' => ['create', 'update']],
			[['checkin_from', 'checkin_to', 'checkout_from', 'checkout_to'], 'date', 'format' => 'HH:mm', 'on' => ['create', 'update']],
			['stars', 'integer', 'min' => 1, 'max' => 5, 'on' => ['create', 'update']],
			['partner', 'boolean', 'on' => ['create', 'update']],
			['description', 'string'],
			[['title', 'weburl', 'certificate'], 'string', 'max' => 100, 'on' => ['create', 'update']],
			[['street', 'city'], 'string', 'max' => 45, 'on' => ['create', 'update']],
			[['house_nr', 'postal_code'], 'string', 'max' => 10, 'on' => ['create', 'update']],
			[['facility_type_id', 'place_type_id', 'properties'], 'safe', 'on' => ['create', 'update']]
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

	/**
	 * Saves Facility model
	 * @param bool $insert
	 */
	public function saveModel($insert = true) {
		$facility = new Facility();
		if ($this->facility_id)
			$facility->id = $this->facility_id;
		$facility->isNewRecord = $insert;
		$facility->attributes = $this->toArray();
		if ($insert)
			$facility->completed = false;
		$facility->save(false);
		if ($insert)
			$this->facility_id = $facility->id;
	}

	/**
	 * Loads Facility model into FacilityForm
	 * @param $id
	 */
	public function loadModel($id) {
		$facility = Facility::findOne($id);
		foreach ($facility->attributes as $key => $value) {
			if (property_exists($this, $key))
				$this->$key = $value;
		}
		$this->facility_id = $facility->id;
	}

	/**
	 * Deletes Facility model
	 * @param $id
	 *
	 * @throws \Exception
	 */
	public function deleteModel($id) {
		$facility = Facility::findOne($id);
		$facility->delete();
		//TODO dodělat mazání součástí a relací
	}

	/**
	 * Gets facility types for drop down list
	 * @return array
	 */
	public function getFacilityTypeOptions() {
		/** @noinspection PhpUndefinedMethodInspection */
		return ArrayHelper::map(FacilityType::find()->orderBy('title')->all(), 'id', 'title');
	}

	/**
	 * Gets subjects for drop down list
	 * @return array
	 */
	public function getSubjectOptions() {
		return ArrayHelper::map(Subject::find()->completed()->orderBy('title')->all(), 'id', 'title');
	}

	/**
	 * Gets place types for drop down list
	 * @return array
	 */
	public function getPlaceTypeOptions() {
		return ArrayHelper::map(PlaceType::find()->orderBy('title')->all(), 'id', 'title');
	}

	/**
	 * Gets people for drop down list according subject
	 * @return array
	 */
	public function getPersonOptions() {
		return ArrayHelper::map(ArrayHelper::toArray(Person::find()->where('subject_id = :subject_id', [
			':subject_id' => $this->subject_id
		])->all()), 'id', 'title');
	}
}