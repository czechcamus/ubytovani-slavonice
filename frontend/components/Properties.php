<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 27.5.2015
 * Time: 17:30
 */

namespace frontend\components;

use common\models\facility\Image;
use common\models\property\FacilityProperty;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class Properties displays properties of object
 * @package frontend\components
 */

class Properties extends Widget {

	/**
	 * @var array of object properties
	 */
	public $properties = [];

	/**
	 * @return string returns view file for displaying object properties
	 */
	public function run() {
		return $this->render('properties', ['properties' => $this->properties]);
	}
}