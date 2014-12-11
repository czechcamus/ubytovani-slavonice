<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use Yii;


/**
 * StateController implements the CRUD actions for State model.
 */
class StateController extends SubModelController
{
    public $modelClass = 'common\models\subject\State';
    public $relationName = 'address';
}
