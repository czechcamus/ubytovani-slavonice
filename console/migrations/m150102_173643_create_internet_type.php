<?php
/**
 * Creates or drops table of internet types
 */
use yii\db\Migration;

class m150102_173643_create_internet_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'internet_type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('internet_type');
    }
}