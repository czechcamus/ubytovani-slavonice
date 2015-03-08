<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "property".
 *
 * @property integer $id
 * @property string $title
 * @property integer $property_type
 * @property integer $model_type
 * @property integer $types
 * @property integer $fees
 */
class PropertyModel extends ActiveRecord
{
	const ROOM_PROPERTY = 1;
	const FACILITY_PROPERTY = 2;

	const INTERNET_MODEL = TypeModel::INTERNET_TYPE;
	const PARKING_MODEL = TypeModel::PARKING_TYPE;
	const CATERING_MODEL = TypeModel::CATERING_TYPE;

	//TODO přidat behaviors na mazání záznamů z object_property po smazání property
	//TODO přidat behaviors na přidání záznamů do object_property po přidání property

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['property_type', 'model_type'], 'integer'],
	        [['types', 'fees'], 'boolean'],
            [['title'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'property_type' => Yii::t('app', 'Property Type'),
            'model_type' => Yii::t('app', 'Model Type'),
            'types' => Yii::t('app', 'Types'),
            'fees' => Yii::t('app', 'Fees')
        ];
    }
}
