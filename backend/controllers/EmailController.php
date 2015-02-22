<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use Yii;


/**
 * EmailController implements the CRUD actions for Email model.
 */
class EmailController extends SubModelController
{
    public $modelClass = 'common\models\Email';
    public $relationName = 'person';
}
