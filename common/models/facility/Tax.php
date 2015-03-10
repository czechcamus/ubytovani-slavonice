<?php

namespace common\models\facility;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tax".
 *
 * @property integer $id
 * @property string $tax_value
 *
 * @property ObjectPropertyFee[] $fees
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
        return $this->hasMany(ObjectPropertyFee::className(), ['tax_id' => 'id']);
    }

	/**
	 * Gets formatted value added tax values options
	 * @return array
	 */
	public static function getTaxValueOptions() {
		$items = ArrayHelper::map(self::find()->orderBy(['tax_value' => SORT_DESC])->all(), 'id', 'tax_value');
		$valueUpdater = function(&$item){
			$item = "$item %";
		};
		if (array_walk($items, $valueUpdater))
			return $items;
		else
			return [];
	}
}
