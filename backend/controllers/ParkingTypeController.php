<?php

namespace backend\controllers;

use Yii;
use backend\utilities\TypeModelController;

/**
 * ParkingTypeController implements the CRUD actions for ParkingType model.
 */
class ParkingTypeController extends TypeModelController
{
    public $modelClass = 'common\models\facility\ParkingType';
}
