<?php

namespace backend\controllers;

use backend\utilities\PropertyModelController;
use Yii;

/**
 * FacilityPropertyController implements the CRUD actions for FacilityProperty model.
 */
class FacilityPropertyController extends PropertyModelController
{
	public $modelClass = 'common\models\property\FacilityProperty';
}
