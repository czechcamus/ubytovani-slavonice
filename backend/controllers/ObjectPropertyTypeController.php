<?php

namespace backend\controllers;

use backend\utilities\SubModelController;
use common\models\facility\ObjectProperty;
use Yii;

/**
 * ObjectPropertyTypeController implements the CRUD actions for ObjectPropertyType model.
 */
class ObjectPropertyTypeController extends SubModelController
{
	public $modelClass = 'common\models\facility\ObjectPropertyType';
	public $relationName = 'object_property';

	/**
	 * Creates a new ObjectPropertyType model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @param int $relation_id of main model
	 * @return mixed
	 */
    public function actionCreate($relation_id)
    {
	    /** @var ObjectProperty $model */
        $model = new $this->modelClass;
	    $model->{$this->relationName . '_id'} = $relation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save())
	        return $this->goBack();

        return $this->render('create', compact('model', 'relation_id'));
    }

    /**
     * Updates an existing ObjectPropertyType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $relation_id
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
