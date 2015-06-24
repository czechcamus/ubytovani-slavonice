<?php

namespace frontend\controllers;

use common\models\facility\Room;
use frontend\utilities\FrontendController;

/**
 * Class RoomController implements multiple view actions
 * @package frontend\controllers
 */
class RoomController extends FrontendController
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
