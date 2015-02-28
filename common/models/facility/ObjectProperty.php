<?php

namespace common\models\facility;

use common\models\PropertyModel;
use common\utilities\ObjectPropertysRelationsDelete;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "object_property".
 *
 * @property integer $id
 * @property integer $object_id
 * @property integer $property_id
 * @property string $property_note
 * @property integer $property_value
 *
 * @property PropertyModel $property
 * @propertx ObjectPropertyType[] $objectPropertyTypes
 * @property Fee[] $fees
 */
class ObjectProperty extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_property';
    }

	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'relationsDelete' => ObjectPropertysRelationsDelete::className()
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'property_id'], 'required'],
            [['object_id', 'property_id'], 'integer'],
	        ['property_value', 'boolean'],
            [['property_note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
	        'id' => Yii::t('app', 'ID'),
            'object_id' => Yii::t('app', 'Object ID'),
            'property_id' => Yii::t('app', 'Property ID'),
	        'property_value' => Yii::t('app', 'Property Value'),
            'property_note' => Yii::t('app', 'Property Note'),
        ];
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getObjectPropertyTypes() {
		return $this->hasMany(ObjectPropertyType::className(), ['object_property_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getFees() {
		return $this->hasMany(Fee::className(), ['object_property_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getProperty() {
		return $this->hasOne(PropertyModel::className(), ['id' => 'property_id']);
	}
}
