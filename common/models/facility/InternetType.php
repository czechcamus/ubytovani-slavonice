<?php

namespace common\models\facility;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "internet_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class InternetType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'internet_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['internet_type_id' => 'id']);
    }
}
