<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 14:55
 */

namespace backend\models;


use backend\utilities\ObjectForm;
use common\models\facility\Facility;
use common\models\facility\Image;
use common\models\facility\ObjectProperty;
use common\models\facility\Room;
use common\models\property\FacilityProperty;
use common\models\PropertyModel;
use common\models\subject\Subject;
use common\models\subject\Person;
use common\models\type\FacilityType;
use common\models\Place;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class FacilityForm extends ObjectForm {
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
	public $place_id;
	/** @var string */
	public $street;
	/** @var string */
	public $house_nr;
	/** @var string */
	public $city;
	/** @var string */
	public $postal_code;
	/** @var string */
	public $latitude;
	/** @var string */
	public $longitude;
	/** @var string */
	public $weburl;
	/** @var boolean */
	public $partner;
	/** @var boolean */
	public $active;
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

	/** Constants for selecting right tab on form */
	const FACILITIES_TAB = 1;
	const PROPERTIES_TAB = 2;
	const ROOMS_TAB = 3;
	const IMAGES_TAB = 4;

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['title', 'subject_id', 'person_id', 'city', 'postal_code', 'latitude', 'longitude'], 'required', 'on' => ['create', 'update']],
			[
				['facility_id', 'facility_type_id', 'subject_id', 'person_id', 'place_id', 'stars'],
				'integer',
				'on' => ['create', 'update']
			],
			[
				['checkin_from', 'checkin_to', 'checkout_from', 'checkout_to'],
				'date',
				'format' => 'HH:mm:ss',
				'on'     => ['create', 'update']
			],
			['partner', 'boolean', 'on' => ['create', 'update']],
			['active', 'boolean'],
			['description', 'string'],
			[['title', 'weburl', 'certificate'], 'string', 'max' => 100, 'on' => ['create', 'update']],
			[['street', 'city'], 'string', 'max' => 45, 'on' => ['create', 'update']],
			[['house_nr', 'postal_code'], 'string', 'max' => 10, 'on' => ['create', 'update']],
			[['facility_type_id', 'place_id', 'properties'], 'safe', 'on' => ['create', 'update']],
			[['latitude', 'longitude'], 'number']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'facility_id'      => Yii::t('back', 'ID'),
			'facility_type_id' => Yii::t('back', 'Facility Type'),
			'title'            => Yii::t('back', 'Title'),
			'subject_id'       => Yii::t('back', 'Subject'),
			'person_id'        => Yii::t('back', 'Person'),
			'place_id'         => Yii::t('back', 'Place'),
			'street'           => Yii::t('back', 'Street'),
			'house_nr'         => Yii::t('back', 'House Nr.'),
			'city'             => Yii::t('back', 'City'),
			'postal_code'      => Yii::t('back', 'Postal code'),
			'latitude' => Yii::t('back', 'Latitude'),
			'longitude' => Yii::t('back', 'Longitude'),
			'weburl'           => Yii::t('back', 'Web URL'),
			'partner'          => Yii::t('back', 'Partner'),
			'certificate'      => Yii::t('back', 'Certificate'),
			'stars'            => Yii::t('back', 'Stars'),
			'active'           => Yii::t('back', 'Active'),
			'checkin_from'     => Yii::t('back', 'Checkin From'),
			'checkin_to'       => Yii::t('back', 'Checkin To'),
			'checkout_from'    => Yii::t('back', 'Checkout From'),
			'checkout_to'      => Yii::t('back', 'Checkout To'),
			'description'      => Yii::t('back', 'Description'),
			'properties'       => Yii::t('back', 'Properties')
		];
	}

	/**
	 * Saves Facility model and his properties
	 *
	 * @param bool $insert
	 */
	public function saveModel($insert = true) {
		$facility = new Facility();
		if ($this->facility_id)
			$facility->id = $this->facility_id;
		$facility->isNewRecord = $insert;
		$facility->attributes  = $this->toArray();
		if ($insert)
			$facility->completed = false;
		$facility->save(false);
		if ($insert)
			$this->facility_id = $facility->id;

		if ($this->partner) {
			$properties = FacilityProperty::find()->orderBy('title')->all();
			/** @var PropertyModel $property */
			foreach ($properties as $key => $property) {
				$propertyInputs = [];
				if (isset(Yii::$app->request->post('FacilityForm')['properties'])) {
					$propertyInputs = Yii::$app->request->post('FacilityForm')['properties'][ $key ];
					$objectProperty = ObjectProperty::findOne($propertyInputs['id']);
					if ( ! $objectProperty) {
						$objectProperty     = new ObjectProperty();
						$objectProperty->id = 0;
					}
				} else {
					$objectProperty     = new ObjectProperty();
					$objectProperty->id = 0;
				}
				$objectProperty->object_type    = PropertyModel::FACILITY_PROPERTY;
				$objectProperty->property_value = isset($propertyInputs['property_value']) ? 1 : 0;
				$objectProperty->property_note  = isset($propertyInputs['property_note']) ? $propertyInputs['property_note'] : '';
				$objectProperty->object_id      = $facility->id;
				$objectProperty->property_id    = $property->id;
				$objectProperty->save(false);
			}
		}
	}

	/**
	 * Loads Facility model into FacilityForm
	 * @param $id
	 */
	public function loadModel($id) {
		/** @var Facility $facility */
		$facility = Facility::findOne($id);
		foreach ($facility->attributes as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
		$this->facility_id = $facility->id;
		$this->initProperties();
	}

	/**
	 * Deletes Facility model
	 * @param $id
	 * @throws \Exception
	 */
	public function deleteModel($id) {
		/** @var Facility $facility */
		$facility = Facility::findOne($id);
		$facility->delete();
	}

	/**
	 * Initializes Facility properties
	 */
	protected function initProperties() {
		$this->properties = [];
		$properties       = FacilityProperty::find()->orderBy('title')->all();
		/** @var FacilityProperty $property */
		foreach ($properties as $key => $property) {
			$objectProperty = ObjectProperty::find()->where('object_id = :facility_id AND property_id = :property_id', [
				':facility_id' => $this->facility_id,
				':property_id' => $property->id
			])->one();

			if ($objectProperty) {
				$propertyValues = ArrayHelper::toArray($objectProperty, ['property_value', 'property_note', 'id']);
			} else {
				$propertyValues['property_value'] = 0;
				$propertyValues['property_note']  = '';
				$propertyValues['id']             = null;
			}

			$this->properties[] = [
				'property_id'    => $property->id,
				'property_value' => $propertyValues['property_value'],
				'property_title' => $property->title,
				'types'          => $property->types,
				'fees'           => $property->fees,
				'property_note'  => $propertyValues['property_note'],
				'id'             => $propertyValues['id']
			];
		}
	}

	/**
	 * Gets subjects for drop down list
	 * @return array
	 */
	public function getSubjectOptions() {
		return ArrayHelper::map(Subject::find()->completed()->orderBy('title')->all(), 'id', 'title');
	}

	/**
	 * Gets people for drop down list according subject
	 * @return array
	 */
	public function getPersonOptions() {
		if (isset($this->subject_id)) {
			$items = ArrayHelper::map(ArrayHelper::toArray(Person::find()->where('subject_id = :subject_id', [
				':subject_id' => $this->subject_id
			])->all()), 'id', 'title');
		} else {
			$items = [];
		}

		return $items;
	}

	/**
	 * Returns rooms data provider
	 * @return ActiveQuery
	 */
	public function getRooms() {
		return Room::find()->where(['facility_id' => $this->facility_id]);
	}

	/**
	 * Returns images data provuder
	 * @return static
	 */
	public function getImages() {
		return Image::find()->where(['facility_id' => $this->facility_id]);
	}
}