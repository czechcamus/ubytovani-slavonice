<?php

namespace common\models\type;

use common\models\Email;
use common\models\TypeModel;
use common\utilities\ModelTypeAttribute;
use Yii;


/**
 * This is the Email Type model class
 *
 * @property integer $id
 * @property string $title
 *
 * @property Email[] $emails
 */
class EmailType extends TypeModel
{
	/**
	 * @return array configuration of behaviors.
	 */
	public function behaviors()
	{
		return [
			'type' => [
				'class' => ModelTypeAttribute::className(),
				'modelTypeValue' => self::EMAIL_TYPE
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public static function find()
	{
		return parent::find()->where(['model_type' => self::EMAIL_TYPE]);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['email_type_id' => 'id']);
    }
}
