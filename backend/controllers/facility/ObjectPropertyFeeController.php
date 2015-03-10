<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 3.3.2015
 * Time: 13:57
 */

namespace backend\controllers\facility;


use backend\utilities\SubModelController;
use common\models\facility\ObjectProperty;
use common\models\PropertyModel;
use Yii;

class ObjectPropertyFeeController extends SubModelController
{
	public $modelClass = 'common\models\facility\ObjectPropertyFee';
	public $relationName = 'object_property';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		/** @var ObjectProperty $objectProperty */
		$objectProperty = ObjectProperty::findOne(Yii::$app->request->get('relation_id'));
		$controllerName = $objectProperty->object_type == PropertyModel::FACILITY_PROPERTY ? 'facility' : 'room';
		$this->returnUrlParams = [
			$controllerName . '/update',
			'id' => $objectProperty->object_id
		];
		if ($controllerName == 'room')
			$this->returnUrlParams['relation_id'] = $objectProperty->object->facility_id;
	}
}