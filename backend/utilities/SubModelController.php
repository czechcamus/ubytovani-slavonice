<?php

namespace backend\utilities;

use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;


/**
 * SubModelController implements the CRUD actions for ActiveRecord model.
 */
class SubModelController extends TypeModelController
{
    /** @var  string name of relation_id property */
    public $relationName;

    /**
     * Not implemented.
     */
    public function actionIndex()
    {
        throw new NotFoundHttpException('Unable to resolve the request "person/index".');
    }

    /**
     * Creates a new ActiveRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $relation_id of main model
     * @return mixed
     */
    public function actionCreate($relation_id)
    {
        $session = Yii::$app->session;

        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $model->{$this->relationName . '_id'} = $relation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($session->has('returnUrl'))
                return $this->redirect($session->get('returnUrl'));
            return $this->goBack();
        }

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
        $session = Yii::$app->session;

        /** @var ActiveRecord $model */
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($session->has('returnUrl'))
                return $this->redirect($session->get('returnUrl'));
            return $this->goBack();
        }

        return $this->render('update', compact('model'));
    }
}
