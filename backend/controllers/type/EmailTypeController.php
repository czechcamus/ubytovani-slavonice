<?php

namespace backend\controllers\type;

use backend\utilities\TypeModelController;
use Yii;

/**
 * EmailTypeController implements the CRUD actions for EmailType model.
 */
class EmailTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\EmailType';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->returnUrlParams = [
			'email-type/index'
		];
	}
}
