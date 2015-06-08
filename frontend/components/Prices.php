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
 * Class Prices displays prices of room
 * @package frontend\components
 */

class Prices extends Widget {

	/**
	 * @var array of rooms prices
	 */
	public $prices = [];

	/**
	 * @return string returns view file for displaying rooms prices
	 */
	public function run() {
		return $this->render('prices', ['prices' => $this->prices]);
	}
}