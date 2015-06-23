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

class DateTimeDbConversion extends Behavior
{
	public $attributes = [];

	const DATE_FORMAT = 'php:Y-m-d';
	const DATETIME_FORMAT = 'php:Y-m-d H:i:s';
	const TIME_FORMAT = 'php:H:i:s';

	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_BEFORE_INSERT => 'dateTimeDbConvert',
			ActiveRecord::EVENT_BEFORE_UPDATE => 'dateTimeDbConvert'
		];
	}

	/**
	 * Changes date/time format for store to db
	 */
	public function dateTimeDbConvert() {
		$model = $this->owner;
		foreach ($this->attributes as $attribute) {
			if (!isset($attribute['type']))
				$attribute['type'] = 'date';
			switch ($attribute['type']) {
				case 'datetime':
					$model->{$attribute['name']} = \Yii::$app->formatter->asDatetime($model->{$attribute['name']}, self::DATETIME_FORMAT);
					break;
				case 'time':
					$model->{$attribute['name']} = \Yii::$app->formatter->asTime($model->{$attribute['name']}, self::TIME_FORMAT);
					break;
				default:
					$model->{$attribute['name']} = \Yii::$app->formatter->asDate($model->{$attribute['name']}, self::DATE_FORMAT);
					break;
			}
		}
	}
}