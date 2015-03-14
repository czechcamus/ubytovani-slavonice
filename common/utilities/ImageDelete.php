<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.2.2015
 * Time: 22:05
 */

namespace common\utilities;

use common\models\facility\Image;
use common\models\subject\Subject;
use Yii;
use yii\base\Behavior;

class ImageDelete extends Behavior
{
	/**
	 * @return array
	 */
	public function events() {
		return [
			Subject::EVENT_AFTER_DELETE => 'deleteImage'
		];
	}

	/**
	 * Deletes Subjects relations
	 * @throws \Exception
	 */
	public function deleteImage() {
		/** @var Image $image */
		$image = $this->owner;
		// delete thumbnail
		unlink(Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . Yii::$app->params['uploadDir'] . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . $image->filename);
		// delete image
		unlink(Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . Yii::$app->params['uploadDir'] . DIRECTORY_SEPARATOR . $image->filename);
	}
}