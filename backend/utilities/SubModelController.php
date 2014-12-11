<?php

namespace backend\utilities;

use Yii;
use yii\db\ActiveRecord;


/**
 * SubModelController implements the CRUD actions for ActiveRecord model.
 */
class SubModelController extends TypeModelController
{
    /** @var  string name of relation_id property */
    public $relationName;

    /**
     * Not implemented.
     * @return bool
     */
    public function actionIndex()
    {
        return false;
    }

    /**
     * Creates a new ActiveRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $relation_id of main model
     * @return mixed
     */
    public function actionCreate($relation_id)
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $model->{$this->relationName . '_id'} = $relation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save())
            return $this->goBack();

        return $this->render('create', compact('model'));
    }
}
