<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use common\models\subject\Person;
use Yii;


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
            return $this->redirect(['update', 'id' => $model->id]);

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->storeReturnUrl();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $session = Yii::$app->session;
            $session->remove('returnUrl');
            return $this->goBack();
        }

        return $this->render('update', compact('model'));
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
