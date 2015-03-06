<?php

namespace backend\utilities;

use Yii;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * SubModelController implements the CRUD actions for ActiveRecord model.
 */
class SubModelController extends Controller
{
    /** @var  string name of relation_id property */
    public $relationName;

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
     * Creates a new ActiveRecord model.
     * @param integer $relation_id of main model
     * @return mixed
     */
    public function actionCreate($relation_id)
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $model->{$this->relationName . '_id'} = $relation_id;
	    $returnUrl = $this->getReturnUrl();

        if ($model->load(Yii::$app->request->post()) && $model->save())
	        return $this->redirect($returnUrl);

        return $this->render('create', compact('model', 'relation_id', 'returnUrl'));
    }

    /**
     * Updates an existing ActiveRecord model.
     * @param integer $id
     * @param integer $relation_id
     * @throws \yii\web\NotFoundHttpException
     * @return mixed
     */
    public function actionUpdate($id, $relation_id = null)
    {
        /** @var ActiveRecord $model */
        $model = $this->findModel($id);
	    $returnUrl = $this->getReturnUrl();

        if ($model->load(Yii::$app->request->post()) && $model->save())
	        return $this->redirect($returnUrl);

        return $this->render('update', compact('model', 'relation_id', 'returnUrl'));
    }

    /**
     * Deletes an existing ActiveRecord model.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

		return $this->redirect($this->getReturnUrl());
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

	/**
	 * Gets return url
	 * @return mixed|string
	 */
	protected function getReturnUrl()
	{
		$session = Yii::$app->session;
		if ($session->has('returnUrl'))
			return $session->get('returnUrl');
		else
			return Yii::$app->user->returnUrl;
	}
}
