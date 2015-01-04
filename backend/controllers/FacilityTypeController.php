<?php

namespace backend\controllers;

use Yii;
use backend\utilities\TypeModelController;

/**
 * FacilityTypeController implements the CRUD actions for FacilityType model.
 */
class FacilityTypeController extends TypeModelController
{
    public $modelClass = 'common\models\facility\FacilityType';
}
