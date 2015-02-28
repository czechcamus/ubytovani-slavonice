<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.2.2015
 * Time: 20:26
 */

namespace common\models\type;

use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;

class CateringType extends TypeModel
{
	/**
	 * @return array configuration of behaviors
	 */
	public function behaviors() {
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::CATERING_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::CATERING_TYPE]);
	}
}