<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 24.6.2015
 * Time: 14:47
 */

namespace frontend\utilities;


use yii\web\Controller;

class FrontendController extends Controller
{
	/**
	 * Access control for frontend
	 * @return array rules
	 */
	public function behaviors() {
		return [];
	}
}