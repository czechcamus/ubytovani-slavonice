<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use Yii;


/**
 * PhoneController implements the CRUD actions for Phone model.
 */
class PhoneController extends SubModelController
{
    public $modelClass = 'common\models\Phone';
    public $relationName = 'person';
}
