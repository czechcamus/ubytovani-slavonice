<?php

namespace common\models\type;

use common\models\subject\Person;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use Yii;

/**
 * This is the Person Type model class
 *
 * @property integer $id
 * @property string $title
 *
 * @property Person[] $people
 */
class PersonType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::PERSON_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::PERSON_TYPE]);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['person_type_id' => 'id']);
    }
}
