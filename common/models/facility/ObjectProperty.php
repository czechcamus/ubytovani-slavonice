<?php

namespace common\models\facility;

use common\models\TypeModel;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "object_property".
 *
 * @property integer $id
 * @property integer $object_id
 * @property integer $property_id
 * @property string $property_note
 * @property integer $type_id
 * @property string $fee
 * @property string $fee_note
 *
 * @property TypeModel $type
 */
class ObjectProperty extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'property_id'], 'required'],
            [['object_id', 'property_id', 'type_id'], 'integer'],
            [['fee'], 'number'],
            [['property_note', 'fee_note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
	        'id' => Yii::t('app', 'ID'),
            'object_id' => Yii::t('app', 'Object ID'),
            'property_id' => Yii::t('app', 'Property ID'),
            'property_note' => Yii::t('app', 'Property Note'),
            'type_id' => Yii::t('app', 'Type ID'),
            'fee' => Yii::t('app', 'Fee'),
            'fee_note' => Yii::t('app', 'Fee Note'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeModel::className(), ['id' => 'type_id']);
    }
}
