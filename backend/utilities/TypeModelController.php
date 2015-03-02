<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 11.12.2014
 * Time: 15:37
 */

namespace backend\utilities;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubModelController implements the CRUD actions for ActiveRecord model.
 */
class TypeModelController extends Controller
{
    /** @var  string name of the main ActiveRecord model class */
    public $modelClass;

	/**
	 * Access control etc.
	 * @return array
	 */
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
     * Lists all ActiveRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
	    /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $query = $model::find();
        $dataProvider = new ActiveDataProvider(compact('query'));

        return $this->render('index', compact('dataProvider'));
    }

    /**
     * Creates a new ActiveRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect(['index']);

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing ActiveRecord model.
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
     * Deletes an existing ActiveRecord model.
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
     * Finds the ActiveRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = call_user_func([$this->modelClass, 'findOne'], $id);
        if (!$model)
            throw new NotFoundHttpException(Yii::t('back', 'The requested page does not exist.'));

        return $model;
    }
}
