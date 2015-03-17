<?php

namespace common\models;

use common\models\facility\Facility;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "place".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class Place extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	        ['title', 'required'],
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
            'title' => Yii::t('app', 'Title')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['place_id' => 'id']);
    }

	/**
	 * Gets places for drop down list
	 * @return array
	 */
	public static function getPlaceOptions() {
		return ArrayHelper::map(self::find()->orderBy('title')->all(), 'id', 'title');
	}

}
