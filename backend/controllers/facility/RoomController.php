<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 8.3.2015
 * Time: 19:36
 */

namespace backend\controllers\facility;

use backend\models\RoomForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class RoomController extends Controller
{
	/** @var  string page url for return */
	public $returnUrl;

	/** @var  array params for creating page url */
	public $urlParams;

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		$this->urlParams = [
			'facility/update',
			'id' => Yii::$app->request->get('relation_id')
		];
	}

	/**
	 * @inheritdoc
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
	 * Creates a new RoomForm model.
	 * @param integer $relation_id of main model
	 * @return mixed
	 */
	public function actionCreate($relation_id)
	{
		$model = new RoomForm();
		$model->scenario = 'create';
		$model->facility_id = $relation_id;

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->saveModel();
			return $this->redirect(['update', 'id' => $model->room_id]);
		}

		return $this->render('create', [
			'model' => $model,
			'relation_id' => $relation_id,
			'returnUrl' => $this->returnUrl
		]);
	}

}