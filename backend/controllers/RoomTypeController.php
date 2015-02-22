<?php

namespace backend\controllers;

use Yii;
use backend\utilities\TypeModelController;

/**
 * RoomTypeController implements the CRUD actions for RoomType model.
 */
class RoomTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\RoomType';
}