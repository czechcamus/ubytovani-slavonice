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
 * Class Rooms displays rooms of facility
 * @package frontend\components
 */

class Rooms extends Widget {

	/**
	 * @var array of facility rooms
	 */
	public $rooms = [];

	/**
	 * @return string returns view file for displaying facility rooms
	 */
	public function run() {
		return $this->render('rooms', ['rooms' => $this->rooms]);
	}
}