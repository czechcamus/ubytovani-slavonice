<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 13.12.2014
 * Time: 9:33
 */

namespace backend\utilities;

use yii\base\Action;
use yii\web\NotFoundHttpException;

class NotFoundAction extends Action
{
    /** @var string route to be displayed */
    public $route;

    public function run()
    {
        throw new NotFoundHttpException('Unable to resolve the request "' . $this->route . '".');
    }
}