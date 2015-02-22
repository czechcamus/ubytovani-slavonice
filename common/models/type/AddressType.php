<?php

namespace common\models\type;

use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use common\models\Address;
use Yii;


/**
 * This is the Address Type model class
 *
 * @property Address[] $addresses
 */
class AddressType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::ADDRESS_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::ADDRESS_TYPE]);
	}

	/**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['address_type_id' => 'id']);
    }
}
