<?php

namespace common\models\subject;

use common\models\Email;
use common\models\Phone;
use common\models\type\PersonType;
use common\utilities\PersonsRelationsDelete;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $front_title
 * @property string $name
 * @property string $surname
 * @property string $back_title
 * @property integer $subject_id
 * @property integer $person_type_id
 *
 * @property Email[] $emails
 * @property Subject $subject
 * @property Phone[] $phones
 * @property PersonType $personType
 *
 */
class Person extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'person_type_id'], 'required'],
            [['subject_id', 'person_type_id'], 'integer'],
            [['front_title', 'back_title'], 'string', 'max' => 20],
            [['name', 'surname'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'front_title' => Yii::t('app', 'Front Title'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'back_title' => Yii::t('app', 'Back Title'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'person_type_id' => Yii::t('app', 'Person Type'),
        ];
    }

	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'relationsDelete' => PersonsRelationsDelete::className()
		];
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonType()
    {
        return $this->hasOne(PersonType::className(), ['id' => 'person_type_id']);
    }

	/**
	 * Default fields returned by toArray method
	 * @return array
	 */
	public function fields() {
		return [
			'id',
			'title' => function($model) {
				return $model->name . ' ' . $model->surname;
			}
		];
	}

	/**
	 * Extra fields those can be returned by toArray method
	 * @return array
	 */
	public function extraFields() {
		return [
			'front_title',
			'name',
			'surname',
			'back_title'
		];
	}

	/**
	 * Gets person type options
	 * @return array
	 */
	public function getPersonTypeOptions() {
		return ArrayHelper::map(PersonType::find()->orderBy('title')->asArray()->all(), 'id', 'title');
	}
}
