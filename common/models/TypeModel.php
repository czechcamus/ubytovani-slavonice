<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $title
 * @property integer $model_type
 */
class TypeModel extends ActiveRecord
{
	const ADDRESS_TYPE = 1;
	const EMAIL_TYPE = 2;
	const FACILITY_TYPE = 3;
	const INTERNET_TYPE = 4;
	const PARKING_TYPE = 5;
	const PERSON_TYPE = 6;
	const PHONE_TYPE = 7;
	const ROOM_TYPE = 8;
	const CATERING_TYPE = 9;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
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
            'model_type' => Yii::t('app', 'Model Type'),
        ];
    }
}
