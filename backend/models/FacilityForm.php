<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 14:55
 */

namespace backend\models;


use common\models\facility\Facility;
use common\models\facility\ObjectProperty;
use common\models\facility\ObjectPropertyFee;
use common\models\facility\ObjectPropertyType;
use common\models\facility\Room;
use common\models\property\FacilityProperty;
use common\models\PropertyModel;
use common\models\subject\Subject;
use common\models\subject\Person;
use common\models\type\FacilityType;
use common\models\type\PlaceType;
use common\models\TypeModel;
use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class FacilityForm extends Model {
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
	/** @var integer */
	public $actualTab;

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
			[['title', 'subject_id', 'person_id', 'city', 'postal_code'], 'required', 'on' => ['create', 'update']],
			[
				['facility_id', 'facility_type_id', 'subject_id', 'person_id', 'place_type_id', 'stars'],
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
			[['facility_type_id', 'place_type_id', 'properties'], 'safe', 'on' => ['create', 'update']]
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
			'place_type_id'    => Yii::t('back', 'Place Type'),
			'street'           => Yii::t('back', 'Street'),
			'house_nr'         => Yii::t('back', 'House Nr.'),
			'city'             => Yii::t('back', 'City'),
			'postal_code'      => Yii::t('back', 'Postal code'),
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
	 * Saves Facility model and his relations
	 *
	 * @param bool $insert
	 */
	public function saveModel($insert = true) {
		$facility = new Facility();
		if ($this->facility_id) {
			$facility->id = $this->facility_id;
		}
		$facility->isNewRecord = $insert;
		$facility->attributes  = $this->toArray();
		if ($insert) {
			$facility->completed = false;
		}
		$facility->save(false);
		if ($insert) {
			$this->facility_id = $facility->id;
		}

		if ($this->partner) {
			/** @noinspection PhpUndefinedMethodInspection */
			$properties = FacilityProperty::find()->orderBy('title')->all();
			/** @var PropertyModel $property */
			foreach ($properties as $key => $property) {
				$propertyInputs = [];
				if (isset(Yii::$app->request->post('FacilityForm')['properties'])) {
					$propertyInputs = Yii::$app->request->post('FacilityForm')['properties'][ $key ];
					$objectProperty = ObjectProperty::findOne($propertyInputs['id']);
				} else {
					$objectProperty                   = new ObjectProperty();
					$objectProperty->id               = 0;
				}
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
	 *
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
	 *
	 * @param $id
	 *
	 * @throws \Exception
	 */
	public function deleteModel($id) {
		/** @var Facility $facility */
		$facility = Facility::findOne($id);
		$facility->delete();
		//TODO dodělat mazání součástí a relací
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
				$propertyValues['property_value'] = false;
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
	 * Gets property types related to facility property with given property_id
	 *
	 * @param $property_id
	 *
	 * @return ObjectPropertyType[]
	 */
	public function getPropertyTypes($property_id) {
		return ObjectPropertyType::find()->where([
			'object_property_id' => $property_id
		]);
	}

	/**
	 * Gets fees related to facility property with given property_id
	 *
	 * @param $property_id
	 *
	 * @return ObjectPropertyFee[]
	 */
	public function getPropertyFees($property_id) {
		return ObjectPropertyFee::find()->where([
			'object_property_id' => $property_id
		])->orderBy(['value' => SORT_ASC]);
	}

	/**
	 * Check existence of free property types
	 *
	 * @param $property_id
	 * @param $object_property_id
	 *
	 * @return bool
	 */
	public function existsFreeTypes($property_id, $object_property_id) {
		/** @var PropertyModel $property */
		$property         = PropertyModel::findOne($property_id);
		$types_count      = TypeModel::find()->where(['model_type' => $property->model_type])->count();
		$used_types_count = ObjectPropertyType::find()->where(['object_property_id' => $object_property_id])->count();

		return $types_count > $used_types_count;
	}

	/**
	 * Returns rooms data provider
	 *
	 * @param $facility_id
	 *
	 * @return ActiveQuery
	 */
	public function getRooms($facility_id) {
		return Room::find()->where(['facility_id' => $facility_id]);
	}
}