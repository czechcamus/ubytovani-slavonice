<?php

namespace common\models\type;

use common\models\Phone;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use Yii;

/**
 * This is the Phone Type model class
 *
 * @property integer $id
 * @property string $title
 *
 * @property Phone[] $phones
 */
class PhoneType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::PHONE_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::PHONE_TYPE]);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['phone_type_id' => 'id']);
    }
}
