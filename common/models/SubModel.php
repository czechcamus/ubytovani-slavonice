<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 10.12.2014
 * Time: 14:36
 */

namespace common\models;


use Yii;
use yii\db\ActiveRecord;

class SubModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Type'),
        ];
    }
}
