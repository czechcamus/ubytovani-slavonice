<?php

namespace backend\controllers;

use backend\utilities\TypeModelController;
use Yii;


/**
 * AddressTypeController implements the CRUD actions for AddressType model.
 */
class AddressTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\AddressType';
}
