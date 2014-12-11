<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use Yii;


/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends SubModelController
{
    public $modelClass = 'common\models\subject\Person';
}
