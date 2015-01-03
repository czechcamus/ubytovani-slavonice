<?php

namespace common\models\facility;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "facility_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class FacilityType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['facility_type_id' => 'id']);
    }
}
