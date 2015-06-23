<?php

namespace frontend\controllers;

use common\models\facility\Room;
use yii\web\Controller;

/**
 * Class RoomController implements multiple view actions
 * @package frontend\controllers
 */
class RoomController extends Controller
{
	public $layout = 'page';

	/**
	 * Shows room details
	 * @param integer $id
	 * @return string
	 */
    public function actionDetail($id)
    {
	    $model = Room::findOne($id);

        return $this->render('detail', compact('model'));
    }
}
