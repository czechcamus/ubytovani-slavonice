<?php

namespace common\models\subject;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $name
 * @property string $acronym
 *
 * @property Address[] $addresses
 */
class State extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'acronym'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['acronym'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Country'),
            'acronym' => Yii::t('app', 'Acronym'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['state_id' => 'id']);
    }
}
