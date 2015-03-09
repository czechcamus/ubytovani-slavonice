<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 9.3.2015
 * Time: 13:29
 */

namespace backend\utilities;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class BaseModelController extends Controller
{
	/** @var  array params for creating page url */
	public $returnUrlParams;

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
	 * Gets return url from returnUrlParams
	 * @return string
	 */
	protected function getReturnUrl() {
		return Url::to($this->returnUrlParams);
	}
}