<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 28.5.2015
 * Time: 17:50
 */

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Inflector;

/**
 * Class FacilitySearchPropertyList renders property list
 * @package frontend\components
 */
class FacilitySearchPropertyList extends Widget {

	/**
	 * @var array pairs key and title of checkbox
	 */
	public $properties = [];

	/**
	 * @var string name of property array
	 */
	public $propertyName = '';

	/**
	 * @var integer number of columns for organizing checkboxes
	 */
	public $colCnt = 2;

	/**
	 * @var string columns wrapper tag
	 */
	public $wrapperTag = 'div';

	/**
	 * @var array wrapper tag HTML attributes
	 */
	public $wrapperOptions = [];

	/**
	 * @var string output HTML code
	 */
	private $_output = '';

	public function init() {
		if ($this->properties) {
			ob_start();
			$i = 0;
			$testValue = 0;
			$elementCnt = count($this->properties);
			$divider = ceil($elementCnt / $this->colCnt);
			foreach ( $this->properties as $key => $title ) {
				$testValue = $i % $divider;
				if ($testValue == 0) {
					echo Html::beginTag($this->wrapperTag, $this->wrapperOptions);
				}
				$name = $this->propertyName . '[' . $key . ']';
				$id = Inflector::camel2id(strtr($this->propertyName, '[]', '--')) . '_' . $key;
				echo Html::checkbox($name, false, [
					'id' => $id,
					'value' => null
				]);
				echo Html::label($title, $id);
				echo "<br />\n";
				if ($testValue == ($divider - 1)) {
					echo Html::endTag($this->wrapperTag);
				}
				++$i;
			}
			if ($testValue != ($divider - 1)) {
				echo Html::endTag($this->wrapperTag);
			}
			$this->_output = ob_get_clean();
		}
	}

	public function run() {
		return $this->_output;
	}
}