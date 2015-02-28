<?php

namespace common\models\facility;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "fee".
 *
 * @property integer $id
 * @property string $title
 * @property string $value
 * @property integer $tax_id
 * @property integer $object_property_id
 *
 * @property ObjectProperty $objectProperty
 * @property Tax $tax
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
            [['title', 'value'], 'required'],
            [['value'], 'number'],
            [['tax_id', 'object_property_id'], 'integer'],
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
            'object_property_id' => Yii::t('app', 'Object Property ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectProperty()
    {
        return $this->hasOne(ObjectProperty::className(), ['id' => 'object_property_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTax()
    {
        return $this->hasOne(Tax::className(), ['id' => 'tax_id']);
    }
}
