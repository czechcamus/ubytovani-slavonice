<?php

namespace frontend\controllers;

use common\models\BookingRequest;
use common\models\facility\Room;
use frontend\utilities\FrontendController;
use Yii;
use yii\web\HttpException;

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
	 * @return string
	 * @throws HttpException
	 */
	public function actionSendRequest()
	{
		$requestModel = new BookingRequest;

		if ($requestModel->load(Yii::$app->request->post())) {
			if ($requestModel->save()) {
				//TODO send email and update date fields

				$session = Yii::$app->session;
				$session->setFlash('info', Yii::t('front', 'Booking request successfully sent!'));
			}
			return $this->redirect(['detail', 'id' => $requestModel->room_id]);
		} else {
			throw new HttpException(404, Yii::t('front', 'Return page not found'));
		}
	}
}
