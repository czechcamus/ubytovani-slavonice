<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 21.2.2015
 * Time: 18:25
 */

namespace common\utilities;


use common\models\TypeModel;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class ModelTypeAttribute extends Behavior
{
	public $modelTypeValue;

	/**
	 * @return array
	 */
	public function events() {
		return [
			ActiveRecord::EVENT_BEFORE_INSERT => 'setModelType',
			ActiveRecord::EVENT_BEFORE_UPDATE => 'setModelType'
		];
	}

	/**
	 * Sets model_type attribute
	 */
	public function setModelType() {
		/** @var TypeModel $model */
		$model = $this->owner;
		$model->model_type = $this->modelTypeValue;
	}
}