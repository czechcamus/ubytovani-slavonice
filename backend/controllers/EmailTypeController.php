<?php

namespace backend\controllers;

use backend\utilities\TypeModelController;
use Yii;

/**
 * EmailTypeController implements the CRUD actions for EmailType model.
 */
class EmailTypeController extends TypeModelController
{
    public $modelClass = 'common\models\type\EmailType';
}
