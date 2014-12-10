<?php

namespace common\models\subject;

use common\models\SubModel;
use Yii;


/**
 * This is the model class for table "address_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Address[] $addresses
 */
class AddressType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['address_type_id' => 'id']);
    }
}
