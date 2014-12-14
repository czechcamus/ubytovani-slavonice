<?php

namespace common\models\subject;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "person_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Person[] $people
 */
class PersonType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['person_type_id' => 'id']);
    }
}
