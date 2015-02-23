<?php

namespace common\models\facility;

use common\models\PropertyModel;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "fee".
 *
 * @property integer $id
 * @property string $title
 * @property string $value
 * @property integer $tax_id
 * @property integer $property_id
 *
 * @property Tax $tax
 * @property PropertyModel $property
 */
class Fee extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'value', 'property_id'], 'required'],
            [['value'], 'number'],
            [['tax_id', 'property_id'], 'integer'],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'value' => Yii::t('app', 'Value'),
            'tax_id' => Yii::t('app', 'Tax ID'),
            'property_id' => Yii::t('app', 'Property ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTax()
    {
        return $this->hasOne(Tax::className(), ['id' => 'tax_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(PropertyModel::className(), ['id' => 'property_id']);
    }
}
