<?php

namespace common\models\subject;

use common\models\SubModel;
use Yii;


/**
 * This is the model class for table "email_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Email[] $emails
 */
class EmailType extends SubModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_type';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['email_type_id' => 'id']);
    }
}
