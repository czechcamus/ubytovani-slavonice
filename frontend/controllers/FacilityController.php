<?php

namespace frontend\controllers;

use common\models\facility\Facility;
use frontend\models\FacilitySearchForm;
use yii\web\Controller;

/**
 * Class FacilityController implements multiple view actions
 * @package frontend\controllers
 */
class FacilityController extends Controller
{
	public $layout = 'page';

	/**
	 * Shows facility details
	 * @param integer $id
	 * @return string
	 */
    public function actionDetail($id)
    {
	    $model = Facility::findOne($id);

        return $this->render('detail', compact('model'));
    }

	/**
	 * Shows list of requested facilities
	 * @return string
	 */
    public function actionIndex()
    {
	    $searchModel = new FacilitySearchForm();
	    $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', compact('dataProvider', 'searchModel'));
    }

	/**
	 * Shows map with facilities
	 * @return string
	 */
    public function actionMap()
    {
        return $this->render('map');
    }

}
