<?php

namespace backend\utilities;

use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;


/**
 * SubModelController implements the CRUD actions for ActiveRecord model.
 */
class SubModelController extends BaseModelController
{
    /** @var  string name of relation_id property */
    public $relationName;

	/** @var  string name of the main ActiveRecord model class */
	public $modelClass;

	/** @var  integer id of relational model */
	public $relationId;

	/**
	 * @inheritdoc
	 */
	public function init() {
		if (!isset($this->relationId) && ($relationId = Yii::$app->request->get('relation_id')))
			$this->relationId = $relationId;
	}

    /**
     * Creates a new ActiveRecord model.
     * @return mixed
     */
    public function actionCreate()
    {
        /** @var ActiveRecord $model */
        $model = new $this->modelClass;
        $model->{$this->relationName . '_id'} = $this->relationId;

        if ($model->load(Yii::$app->request->post()) && $model->save())
	        return $this->redirect($this->getReturnUrl());

        return $this->render('create',[
	        'model' => $model,
	        'relation_id' => $this->relationId,
	        'returnUrl' => $this->getReturnUrl()
        ]);
    }

    /**
     * Updates an existing ActiveRecord model.
     * @param integer $id
     * @throws \yii\web\NotFoundHttpException
     * @return mixed
     */
    public function actionUpdate($id)
    {
        /** @var ActiveRecord $model */
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
	        return $this->redirect($this->getReturnUrl());

        return $this->render('update', [
	        'model' => $model,
	        'relation_id' => $this->relationId,
	        'returnUrl' => $this->getReturnUrl()
        ]);
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
}
