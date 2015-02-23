<?php

namespace common\models\facility;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tax".
 *
 * @property integer $id
 * @property string $tax_value
 *
 * @property Fee[] $fees
 */
class Tax extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_value'], 'required'],
            [['tax_value'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tax_value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFees()
    {
        return $this->hasMany(Fee::className(), ['tax_id' => 'id']);
    }
}
