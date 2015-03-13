<?php

namespace common\models\facility;

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
		$target = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . Yii::$app->params['uploadDir'] . DIRECTORY_SEPARATOR . md5(uniqid()) . '.' . array_pop($ext);
		if (move_uploaded_file($imageTmpName, $target)) {
			$success = true;
			$data['title'] = Yii::t('back', 'Photo');
			$data['filename'] = $imageName;
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
