<?php

namespace common\models\subject;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "phone_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Phone[] $phones
 */
class PhoneType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['phone_type_id' => 'id']);
    }
}
