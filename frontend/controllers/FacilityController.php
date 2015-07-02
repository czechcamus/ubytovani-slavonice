<?php

namespace frontend\controllers;

use common\models\facility\Facility;
use frontend\models\FacilitySearchForm;
use frontend\utilities\FrontendController;

/**
 * Class FacilityController implements multiple view actions
 * @package frontend\controllers
 */
class FacilityController extends FrontendController
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
	    $models = Facility::find()->andWhere(['active' => 1])->all();

        return $this->render('map', compact('models'));
    }

}
