<?php

namespace common\models\type;

use common\models\facility\Facility;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the Facility Type model class
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class FacilityType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::FACILITY_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::FACILITY_TYPE]);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['facility_type_id' => 'id']);
    }

	/**
	 * Gets facility types for drop down list
	 * @return array
	 */
	public static function getFacilityTypeOptions() {
		return ArrayHelper::map(self::find()->orderBy('title')->all(), 'id', 'title');
	}
}
