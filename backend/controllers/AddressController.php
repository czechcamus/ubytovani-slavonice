<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use common\models\Address;
use Yii;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends SubModelController
{
    public $modelClass = 'common\models\Address';
    public $relationName = 'subject';

    /**
     * Creates a new Address model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $relation_id of main model
     * @return mixed
     */
    public function actionCreate($relation_id)
    {
        /** @var Address $model */
        $model = new $this->modelClass;
        $model->{$this->relationName . '_id'} = $relation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->goBack();

        return $this->render('create', compact('model', 'relation_id'));
    }

    /**
     * Updates an existing Address model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $relation_id
     * @throws \yii\web\NotFoundHttpException
     * @return mixed
     */
    public function actionUpdate($id, $relation_id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->goBack();

        return $this->render('update', compact('model', 'relation_id'));
    }
}
