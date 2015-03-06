<?php

namespace backend\controllers\facility;

use backend\models\FacilityForm;
use common\models\facility\Facility;
use Yii;
use common\models\facility\SearchFacility;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * FacilityController implements the CRUD actions for Facility model.
 */
class FacilityController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
	            'class' => AccessControl::className(),
	            'rules' => [
		            [
			            'roles' => ['@'],
			            'allow' => true
		            ]
	            ]
            ]
        ];
    }

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
     * If creation is successful, the browser will be redirected to the 'view' page.
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
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	    // Stores actual url to user session
	    Yii::$app->user->returnUrl = Yii::$app->request->url;

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
     * Deletes an existing Facility model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
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
