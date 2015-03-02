<?php

namespace common\models\facility;

use common\models\TypeModel;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "object_property_type".
 *
 * @property integer $object_property_id
 * @property integer $type_id
 *
 * @property TypeModel $type
 * @property ObjectProperty $objectProperty
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
            [['type_id'], 'required'],
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

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getObjectProperty() {
		return $this->hasOne(ObjectProperty::className(), ['id' => 'object_property_id']);
	}

	/**
	 * Gets unused property type options
	 *
	 * @param integer $model_type
	 * @param $object_property_id
	 * @param int $type_id
	 *
	 * @return array
	 */
	public function getPropertyTypeOptions($model_type, $object_property_id, $type_id = 0) {
		$query = ObjectPropertyType::find()->select('type_id')->where(['object_property_id' => $object_property_id]);
		if ($type_id)
			$query->andWhere(['not', ['type_id' => $type_id]]);
		$usedTypes = ArrayHelper::getColumn($query->all(), 'type_id');
		return ArrayHelper::map(TypeModel::find()->where(['model_type' => $model_type])
			->andWhere(['not in', 'id', $usedTypes])->all(), 'id', 'title');
	}
}
