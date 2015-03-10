<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 10.3.2015
 * Time: 20:21
 */

namespace backend\utilities;


use Yii;
use yii\grid\DataColumn;

class PriceColumn extends DataColumn
{
	/**
	 * Initialization
	 */
	public function init() {
		$this->label = $this->label ?: Yii::t('back', 'Prices');
		$this->content = [$this, 'makePriceCellContent'];
	}

	/**
	 * @param $model
	 * @return string
	 */
	protected function makePriceCellContent($model) {
		$content = '';
		foreach ($model->prices as $price) {
			$content .= '<em>' . $price->title . '</em>: ' . $price->fee . ' CZK<br />';
		}
		return $content;
	}
}