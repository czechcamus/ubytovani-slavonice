<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 3.3.2015
 * Time: 20:58
 */

namespace backend\controllers\type;


use backend\utilities\TypeModelController;

class CateringTypeController extends TypeModelController
{
	public $modelClass = 'common\models\type\CateringType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'catering-type/index'
		];
	}
}