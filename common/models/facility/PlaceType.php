<?php

namespace common\models\facility;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "place_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Facility[] $facilities
 */
class PlaceType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['place_type_id' => 'id']);
    }
}
