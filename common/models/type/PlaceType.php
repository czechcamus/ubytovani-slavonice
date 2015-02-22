<?php

namespace common\models\type;

use common\models\facility\Facility;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use Yii;

/**
 * This is the Place Type model class
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class PlaceType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::PLACE_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::PLACE_TYPE]);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['place_type_id' => 'id']);
    }
}
