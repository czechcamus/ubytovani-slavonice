<?php

namespace common\models\facility;

use common\utilities\ImageDelete;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $facility_id
 * @property string $title
 * @property string $description
 * @property string $filename
 * @property integer $main
 *
 * @property Facility $facility
 */
class Image extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'imageDelete' => ImageDelete::className()
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_id', 'filename'], 'required'],
            [['facility_id', 'main'], 'integer'],
            [['description'], 'string'],
            [['title', 'filename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'facility_id' => Yii::t('app', 'Facility ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'filename' => Yii::t('app', 'Filename'),
            'main' => Yii::t('app', 'Main'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }

	/**
	 * Stores image to final directory
	 * @param $facility_id
	 * @param $imageName
	 * @param $imageTmpName
	 * @return bool|null
	 */
	public function storeImage($facility_id, $imageName, $imageTmpName) {
		$success = null;
		$data = [];
		$ext = explode('.', basename($imageName));
		$saveName = md5(uniqid()) . '.' . array_pop($ext);
		$target = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . Yii::$app->params['uploadDir'] . DIRECTORY_SEPARATOR . $saveName;
		if (move_uploaded_file($imageTmpName, $target)) {
			\yii\imagine\Image::thumbnail($target, 254, 254)->save(Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . Yii::$app->params['uploadDir'] . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . $saveName, ['quality' => 50]);
			$success = true;
			$data['title'] = Yii::t('back', 'Photo');
			$data['filename'] = $saveName;
		} else {
			$success = false;
		}

		if ($success) {
			$this->saveImage($facility_id, $data);
		}
		return $success;
	}

	/**
	 * Saves image into database table
	 * @param $facility_id
	 * @param $data
	 */
	private function saveImage($facility_id, $data) {
		$this->attributes = $data;
		$this->facility_id = $facility_id;
		$this->main = 0;
		$this->save();
	}
}
