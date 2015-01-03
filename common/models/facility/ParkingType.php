<?php

namespace common\models\facility;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "parking_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class ParkingType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parking_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['parking_type_id' => 'id']);
    }
}
