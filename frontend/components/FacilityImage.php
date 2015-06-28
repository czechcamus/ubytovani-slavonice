<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 27.5.2015
 * Time: 17:30
 */

namespace frontend\components;

use common\models\facility\Image;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class FacilityImage displays image of facility
 * @package frontend\components
 */

class FacilityImage extends Widget {

	/**
	 * @var integer Id of facility
	 */
	public $facilityId = null;

	/**
	 * @var integer Id of specific image
	 */
	public $imageId = null;

	/**
	 * @var bool specifies if is displayed thumbnail or full image
	 */
	public $thumbnail = false;

	/**
	 * @var array HTML attributes of image tag
	 */
	public $options = [];

	/**
	 * @var string image tag if image is specified or no image div tag
	 */
	private $_tag;

	/**
	 * Initializes image widget
	 */
	public function init() {
		/** @var Image $image */
		$image = null;
		if ($this->facilityId) {
			$image = Image::findOne([
				'facility_id' => $this->facilityId,
				'main' => 1
			]);
		}
		if ($this->imageId) {
			$image = Image::findOne($this->imageId);
		}
		if ($image) {
			$this->_tag = Html::img(\Yii::$app->params['imageUrl'] . ($this->thumbnail ? 'thumbnails/' : '') . $image->filename, $this->options);
		} else {
			$this->_tag = Html::tag('div', '<i class="white-text large material-icons">block</i>', ['class' => 'grey lighten-1 center-align']);
		}
	}

	/**
	 * @return string returns tag for displaying
	 */
	public function run() {
		return $this->_tag;
	}
}