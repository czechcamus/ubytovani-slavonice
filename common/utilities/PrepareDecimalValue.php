<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 3.3.2015
 * Time: 19:27
 */

namespace common\utilities;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class PrepareDecimalValue extends Behavior
{
	public $attributes = [];

	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_BEFORE_INSERT => 'prepareDecimalValue',
			ActiveRecord::EVENT_BEFORE_UPDATE => 'prepareDecimalValue'
		];
	}

	/**
	 * Changes comma to point in decimal number
	 */
	public function prepareDecimalValue() {
		$model = $this->owner;
		foreach ($this->attributes as $attribute) {
			$model->$attribute = str_replace(',', '.', $model->$attribute);
		}
	}
}