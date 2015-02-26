<?php

namespace common\models\facility;

use common\models\TypeModel;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "object_property_type".
 *
 * @property integer $object_property_id
 * @property integer $type_id
 *
 * @property TypeModel $type
 */
class ObjectPropertyType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_property_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_property_id', 'type_id'], 'required'],
            [['object_property_id', 'type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'object_property_id' => Yii::t('app', 'Object Property ID'),
            'type_id' => Yii::t('app', 'Type ID'),
        ];
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getType() {
		return $this->hasOne(TypeModel::className(), ['id' => 'type_id']);
	}
}
