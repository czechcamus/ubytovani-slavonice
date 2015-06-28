<?php

namespace frontend\controllers;

use common\models\facility\Room;
use common\models\Request;
use frontend\utilities\FrontendController;
use Yii;

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

	/**
	 * Sends and saves booking request
	 * @param $id
	 * @return string
	 */
	public function actionSendRequest($id)
	{
		/** @var Room $model */
		$model = Room::findOne($id);
		$requestModel = new Request;

		if ($requestModel->load(Yii::$app->request->post()) && $requestModel->save()) {

		}

		return $this->renderFile('@app/views/general/modalRequest.php', [
			'model' => $model,
			'requestModel' => $requestModel,
			'displayForm' => true,
			'facilityId' => $model->facility_id
		]);
	}

}
