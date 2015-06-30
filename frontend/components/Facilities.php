<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 27.5.2015
 * Time: 17:30
 */

namespace frontend\components;

use common\models\facility\Facility;
use yii\base\Widget;

/**
 * Class Facilities displays less count of facilities
 * @package frontend\components
 */

class Facilities extends Widget {

	/** @var string type of usage - index, slider */
	public $usage = 'index';

	/** @var bool if list of partner facilities only */
	public $partnersOnly = true;

	/** @var bool if list of facilities has random order */
	public $randomOrder = true;

	/** @var int count of items in list, 0 means all items */
	public $itemsCount = 5;

	/** @var int count of words in description */
	public $wordsCount = 12;

	/**
	 * @var array of facilities
	 */
	private $_facilities = [];

	public function init() {
		$items = Facility::find();
		if ($this->partnersOnly === true)
			$items->andWhere(['partner' => 1]);
		if ($this->randomOrder === true)
			$items->orderBy(['rand()' => SORT_DESC]);
		if ($this->itemsCount > 0)
			$items->limit($this->itemsCount);
		$this->_facilities = $items->all();
	}

	/**
	 * @return string returns view file for displaying facilities
	 */
	public function run() {
		return $this->render('facilities', [
			'facilities' => $this->_facilities,
			'usage' => $this->usage,
			'wordsCount' => $this->wordsCount
		]);
	}
}