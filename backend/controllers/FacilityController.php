<?php

namespace backend\controllers;

use backend\models\FacilityForm;
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
	    $model = new FacilityForm();
	    $model->loadModel($id);

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
	    $this->storeReturnUrl();
        $model = new FacilityForm();
	    $model->loadModel($id);
	    $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->redirect(['view', 'id' => $model->facility_id]);
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
	    $model->loadModel($id);
	    $model->deleteModel();

        return $this->redirect(['index']);
    }

	/**
	 * Stores actual page url.
	 */
	private function storeReturnUrl()
	{
		Yii::$app->user->returnUrl = Yii::$app->request->url;
	}
}
