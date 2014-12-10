<?php

namespace common\models\subject;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subject_address".
 *
 * @property integer $subject_id
 * @property integer $address_id
 */
class SubjectAddress extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'address_id'], 'integer'],
            [['subject_id', 'address_id'], 'unique', 'targetAttribute' => ['subject_id', 'address_id'], 'message' => 'The combination of Subject ID and Address ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => Yii::t('app', 'Subject ID'),
            'address_id' => Yii::t('app', 'Address ID'),
        ];
    }
}
