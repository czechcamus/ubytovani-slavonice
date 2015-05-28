<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.5.2015
 * Time: 12:12
 */

namespace frontend\utilities\materialize;

/**
 * Class ActiveForm extends yii\widgets\ActiveFrom for Materialize CSS
 * @package frontend\utilities\materialize
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
	/**
	 * @inheritdoc
	 */
	public $fieldClass = 'frontend\utilities\materialize\ActiveField';
}