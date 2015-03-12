<?php

namespace common\models\facility;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $facility_id
 * @property string $title
 * @property string $description
 * @property string $filename
 * @property integer $main
 *
 * @property Facility $facility
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_id', 'filename'], 'required'],
            [['facility_id', 'main'], 'integer'],
            [['description'], 'string'],
            [['title', 'filename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'facility_id' => Yii::t('app', 'Facility ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'filename' => Yii::t('app', 'Filename'),
            'main' => Yii::t('app', 'Main'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }
}
