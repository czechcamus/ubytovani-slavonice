<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.5.2015
 * Time: 12:18
 */

namespace frontend\utilities\materialize;


class ActiveField extends \yii\widgets\ActiveField
{
	/**
	 * @var null $options for Materialize CSS fields
	 */
	public $options = ['class' => 'input-field col s12'];

	/**
	 * @var string $template for Materialize CSS fields
	 */
	public $template = "{input}\n{label}\n{hint}\n{error}";

	/**
	 * @var array $inputOptions dafaults to nothing needed
	 */
	public $inputOptions = [];

	/**
	 * @var array $labelOptions dafaults to nothing needed
	 */
	public $labelOptions = [];
}