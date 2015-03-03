<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 3.3.2015
 * Time: 13:57
 */

namespace backend\controllers\facility;


use backend\utilities\SubModelController;

class ObjectPropertyFeeController extends SubModelController
{
	public $modelClass = 'common\models\facility\ObjectPropertyFee';
	public $relationName = 'object_property';
}