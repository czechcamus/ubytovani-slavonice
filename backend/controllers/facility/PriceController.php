<?php

namespace backend\controllers\facility;

use Yii;
use backend\utilities\SubModelController;

/**
 * PriceController implements the CRUD actions for Price model.
 */
class PriceController extends SubModelController
{
    public $modelClass = 'common\models\facility\Price';
    public $relationName = 'room';
}
