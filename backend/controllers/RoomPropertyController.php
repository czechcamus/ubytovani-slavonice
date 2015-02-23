<?php

namespace backend\controllers;

use backend\utilities\PropertyModelController;
use Yii;

/**
 * RoomPropertyController implements the CRUD actions for RoomProperty model.
 */
class RoomPropertyController extends PropertyModelController
{
	public $modelClass = 'common\models\property\RoomProperty';
}
