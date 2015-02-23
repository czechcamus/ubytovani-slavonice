<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.2.2015
 * Time: 21:20
 */

namespace common\utilities;


use yii\db\ActiveQuery;

class StatusQuery extends ActiveQuery
{
	public function completed($state = true)
	{
		$this->andWhere(['completed' => $state]);
		return $this;
	}
}