<?php

namespace backend\controllers\facility;

use backend\models\FacilityForm;
use backend\utilities\BaseModelController;
use common\models\facility\Facility;
use Yii;
use common\models\facility\SearchFacility;

/**
 * FacilityController implements the CRUD actions for Facility model.
 */
class FacilityController extends BaseModelController
{
    /**
     * Lists all Facility models.
     * @return mixed
     */
    public function actionIndex()
    {
	    $session = Yii::$app->session;
	    $session->remove('actual_tab');

        $searchModel = new SearchFacility();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    /**
     * Displays a single Facility model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	    $model = Facility::findOne($id);

        return $this->render('view', compact('model'));
    }

    /**
     * Creates a new Facility model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FacilityForm();
	    $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	        $model->saveModel();
            return $this->redirect(['update', 'id' => $model->facility_id]);
        }

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing Facility model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new FacilityForm();
	    $model->loadModel($id);
	    $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	        $model->saveModel(false);
	        $this->refresh();
        }

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing FacilityForm model.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	    $model = new FacilityForm();
	    $model->deleteModel($id);

        return $this->redirect(['index']);
    }

	/**
	 * Sets actual tab value
	 * @param $tab_id
	 */
	public function actionSetActualTab($tab_id) {
		$session = Yii::$app->session;
		$session->set('actual_tab', $tab_id);
	}
}
