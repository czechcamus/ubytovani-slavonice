<?php

namespace common\models\subject;

use common\models\Address;
use common\models\User;
use common\utilities\SubjectsRelationsDelete;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\Query;
use yii\helpers\Html;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $title
 * @property string $note
 * @property string $company_nr
 * @property string $tax_nr
 * @property integer $completed
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $creator
 * @property User $updater
 * @property Person[] $people
 * @property Address[] $addresses
 */
class Subject extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @return array configuration of behaviors.
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            'blame' => BlameableBehavior::className(),
	        'relationsDelete' => SubjectsRelationsDelete::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['note'], 'string'],
            [['created_at', 'updated_at', 'completed'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 45],
            [['company_nr'], 'string', 'max' => 10],
            [['tax_nr'], 'string', 'max' => 14]
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
            'note' => Yii::t('app', 'Note'),
            'company_nr' => Yii::t('app', 'Company Nr'),
            'tax_nr' => Yii::t('app', 'Tax Nr'),
            'completed' => Yii::t('app', 'Completed'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['subject_id' => 'id']);
    }

    /**
     * @return string HTML code for displaying addresses
     */
    public function renderAddresses()
    {
        $addressesString = '';
        foreach ($this->addresses as $address)
        {
            $addressesString .= Html::tag('em', $address->addressType->title . ': ');
            $addressesString .= implode(', ', array_filter($address->toArray(['street', 'house_nr', 'city', 'postal_code']))) . '<br />';
        }

        return $addressesString;
    }

    /**
     * @return string HTML code for displaying people
     */
    public function renderPeople()
    {
        $peopleString = '';
        foreach ($this->people as $person) {
            $peopleString .= Html::tag('em', $person->personType->title . ': ');
            $peopleString .= implode(' ', array_filter($person->toArray(['name', 'surname']))) . '<br />';
        }

        return $peopleString;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Checks completion of subject related data
     * @return bool
     */
    public function checkCompletion()
    {
	    $query = new Query();
	    $addresses = $query->select('id')->from('address')->where(['subject_id' => $this->id])->count();
	    $persons = $query->select('id')->from('person')->where(['subject_id' => $this->id])->column();
	    $phones = $query->select('id')->from('phone')->where(['in', 'person_id', $persons])->count();
        return ($addresses AND $phones);
    }
}
