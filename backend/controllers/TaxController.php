<?php

namespace backend\controllers;

use Yii;
use common\models\facility\Tax;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaxController implements the CRUD actions for Tax model.
 */
class TaxController extends Controller
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
     * Lists all Tax models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tax::find(),
        ]);

        return $this->render('index', compact('dataProvider'));
    }

    /**
     * Creates a new Tax model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tax();

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect(['index']);

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing Tax model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect(['index']);

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing Tax model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tax model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tax the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tax::findOne($id)) !== null)
            return $model;
        else
	        throw new NotFoundHttpException(Yii::t('back', 'The requested page does not exist.'));
    }
}
