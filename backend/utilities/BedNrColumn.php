<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 10.3.2015
 * Time: 21:41
 */

namespace backend\utilities;


use Yii;
use yii\grid\DataColumn;

class BedNrColumn extends DataColumn
{
	/**
	 * Initialization
	 */
	public function init() {
		$this->label = $this->label ?: Yii::t('back', 'Total Bed Nr');
		$this->content = [$this, 'makeBedNrCellContent'];
	}

	/**
	 * @param $model
	 * @return int
	 */
	protected function makeBedNrCellContent($model) {
		$content = 0;
		foreach ($model->rooms as $room) {
			$content += $room->bed_nr;
		}
		return $content;
	}
}