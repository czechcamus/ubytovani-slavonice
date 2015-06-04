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
			while ($property = current($this->properties)) {
				$testValue = $i % $divider;
				if ($testValue == 0) {
					echo Html::beginTag($this->wrapperTag, $this->wrapperOptions);
				}
				$name = $this->propertyName . '[' . key($this->properties) . ']';
				$id = Inflector::camel2id(strtr($this->propertyName, '[]', '--')) . '_' . key($this->properties);
				echo Html::checkbox($name, ($property['value'] == 1 ? true : false), [
					'id' => $id,
					'value' => $property['value']
				]);
				echo Html::label($property['title'], $id);
				echo "<br />\n";
				if ($testValue == ($divider - 1)) {
					echo Html::endTag($this->wrapperTag);
				}
				++$i;
				next($this->properties);
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