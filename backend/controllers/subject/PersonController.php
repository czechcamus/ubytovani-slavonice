<?php

namespace backend\controllers\subject;

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
	public $isParentModel = true;

	/**
	 * Gets people list of given subject
	 * @return \yii\console\Response|Response
	 */
	public function actionGetSubjectPersonList() {
		$subject_id = Yii::$app->request->get('subId');
		$items =  ArrayHelper::toArray(Person::find()->where('subject_id = :subject_id', [
			':subject_id' => $subject_id
		])->all());

		$response = Yii::$app->response;
		$response->format = Response::FORMAT_JSON;
		$response->data = ArrayHelper::map($items, 'id', 'title');
		return $response;
	}
}
