<?php

namespace backend\controllers;

use Yii;
use backend\utilities\SubModelController;

/**
 * PriceController implements the CRUD actions for Price model.
 */
class PriceController extends SubModelController
{
    public $modelClass = 'common\models\subject\Price';
    public $relationName = 'room';
}
