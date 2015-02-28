<?php

namespace common\models\type;

use common\models\facility\Facility;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use Yii;

/**
 * This is the Parking Type model class
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class ParkingType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::PARKING_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::PARKING_TYPE]);
	}
}
