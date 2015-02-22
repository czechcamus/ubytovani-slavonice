<?php

namespace backend\controllers;

use Yii;
use backend\utilities\TypeModelController;

/**
 * PersonTypeController implements the CRUD actions for PersonType model.
 */
class PersonTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\PersonType';
}
