<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 8.3.2015
 * Time: 20:49
 */

namespace backend\models;


use backend\utilities\ObjectForm;
use common\models\facility\Availability;
use common\models\facility\ObjectProperty;
use common\models\facility\Price;
use common\models\facility\Room;
use common\models\property\RoomProperty;
use common\models\PropertyModel;
use common\models\type\RoomType;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class RoomForm extends ObjectForm {
	/** @var integer */
	public $room_id;
	/** @var integer */
	public $facility_id;
	/** @var integer */
	public $room_type_id;
	/** @var string */
	public $title;
	/** @var integer */
	public $bed_nr;
	/** @var integer */
	public $nr;
	/** @var string */
	public $note;
	/** @var array */
	public $properties = [];

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['room_type_id', 'title', 'bed_nr', 'nr'], 'required', 'on' => ['create', 'update']],
			[['room_type_id', 'bed_nr', 'nr'], 'integer', 'on' => ['create', 'update']],
			['title', 'string', 'max' => 45, 'on' => ['create', 'update']],
			['note', 'string', 'on' => ['create', 'update']],
			['properties', 'safe', 'on' => ['create', 'update']]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'room_id' => Yii::t('back', 'ID'),
			'facility_id' => Yii::t('back', 'Facility'),
			'room_type_id' => Yii::t('back', 'Room Type'),
			'title' => Yii::t('back', 'Title'),
			'bed_nr' => Yii::t('back', 'Beds Nr'),
			'nr' => Yii::t('back', 'Rooms Nr'),
			'note' => Yii::t('back', 'Note')
		];
	}

	/**
	 * Saves Room model and his properties
	 *
	 * @param bool $insert
	 */
	public function saveModel($insert = true) {
		$room = new Room();
		if ($this->room_id)
			$room->id = $this->room_id;
		$room->isNewRecord = $insert;
		$room->attributes = $this->toArray();
		$room->save(false);
		if ($insert)
			$this->room_id = $room->id;

		if ($room->facility->partner) {
			$properties = RoomProperty::find()->orderBy('title')->all();
			/** @var PropertyModel $property */
			foreach ($properties as $key => $property) {
				$propertyInputs = [];
				if (isset(Yii::$app->request->post('RoomForm')['properties'])) {
					$propertyInputs = Yii::$app->request->post('RoomForm')['properties'][$key];
					$objectProperty = ObjectProperty::findOne($propertyInputs['id']);
					if (!$objectProperty) {
						$objectProperty = new ObjectProperty();
						$objectProperty->id = 0;
					}
				} else {
					$objectProperty = new ObjectProperty();
					$objectProperty->id = 0;
				}
				$objectProperty->object_type = PropertyModel::ROOM_PROPERTY;
				$objectProperty->property_value = isset($propertyInputs['property_value']) ? 1 : 0;
				$objectProperty->property_note = isset($propertyInputs['property_note']) ? $propertyInputs['property_note'] : '';
				$objectProperty->object_id = $room->id;
				$objectProperty->property_id = $property->id;
				$objectProperty->save(false);
			}
		}
	}

	/**
	 * Loads Romm model into RoomForm
	 * @param $id
	 */
	public function loadModel($id) {
		/** @var Room $room */
		$room = Room::findOne($id);
		foreach ($room->attributes as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
		$this->room_id = $room->id;
		$this->initProperties();
	}

	/**
	 * Deletes Room model
	 * @param $id
	 * @throws \Exception
	 */
	public function deleteModel($id) {
		/** @var Room $room */
		$room = Room::findOne($id);
		$room->delete();
	}

	protected function initProperties() {
		$this->properties = [];
		$properties = RoomProperty::find()->orderBy('title')->all();
		/** @var RoomProperty $property */
		foreach ($properties as $key => $property) {
			$objectProperty = ObjectProperty::find()->where('object_id = :room_id AND property_id = :property_id', [
				':room_id' => $this->room_id,
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
	 * Gets room types for drop down list
	 * @return array
	 */
	public function getRoomTypeOptions() {
		/** @noinspection PhpUndefinedMethodInspection */
		return ArrayHelper::map(RoomType::find()->orderBy('title')->all(), 'id', 'title');
	}

	/**
	 * Gets prices of room
	 * @return ActiveQuery
	 */
	public function getPrices() {
		return Price::find()->where([
			'room_id' => $this->room_id
		])->orderBy(['fee' => SORT_ASC]);
	}

	/**
	 * Gets availabilities of room
	 * @return ActiveQuery
	 */
	public function getAvailabilities() {
		return Availability::find()->where([
			'room_id' => $this->room_id
		])->orderBy(['date_from' => SORT_ASC]);
	}
}