<?php

namespace backend\controllers;

use Yii;
use backend\utilities\TypeModelController;

/**
 * PlaceTypeController implements the CRUD actions for PlaceType model.
 */
class PlaceTypeController extends TypeModelController
{
    public $modelClass = 'common\models\facility\PlaceType';
}