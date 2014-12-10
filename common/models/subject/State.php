<?php

namespace common\models\subject;

use common\models\SubModel;
use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $title
 * @property string $acronym
 *
 * @property Address[] $addresses
 */
class State extends SubModel
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
        $parentRules = parent::rules();
        $currentRules = [
            [['acronym'], 'required'],
            [['acronym'], 'string', 'max' => 3]
        ];
        return array_merge($parentRules, $currentRules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $parentLabels = parent::attributeLabels();
        $currentLabels = [
            'acronym' => Yii::t('app', 'Acronym'),
        ];
        return array_merge($parentLabels, $currentLabels);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['state_id' => 'id']);
    }
}
