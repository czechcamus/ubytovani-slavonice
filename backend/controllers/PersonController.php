<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use common\models\subject\Person;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Response;


/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends SubModelController
{
    public $modelClass = 'common\models\subject\Person';
    public $relationName = 'subject';

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $relation_id of main model
     * @return mixed
     */
    public function actionCreate($relation_id)
    {
        /** @var Person $model */
        $model = new $this->modelClass;
        $model->{$this->relationName . '_id'} = $relation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->redirect(['update', 'id' => $model->id, 'relation_id' => $relation_id]);

        return $this->render('create', compact('model', 'relation_id'));
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $relation_id
     * @throws \yii\web\NotFoundHttpException
     * @return mixed
     */
    public function actionUpdate($id, $relation_id)
    {
        $this->storeReturnUrl();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $session = Yii::$app->session;
            $session->remove('returnUrl');
            return $this->goBack();
        }

        return $this->render('update', compact('model', 'relation_id'));
    }

	/**
	 * Gets people list of given subject
	 * @return \yii\console\Response|Response
	 */
	public function actionGetPeopleList() {
		$subject_id = Yii::$app->request->get('subId');
		$items =  ArrayHelper::toArray(Person::find()->where('subject_id = :subject_id', [
			':subject_id' => $subject_id
		])->all());

		$response = Yii::$app->response;
		$response->format = Response::FORMAT_JSON;
		$response->data = ArrayHelper::map($items, 'id', 'title');
		return $response;
	}

    /**
     * Stores actual page url.
     */
    private function storeReturnUrl()
    {
        $session = Yii::$app->session;
        $session->set('returnUrl', Yii::$app->request->url);
    }
}
