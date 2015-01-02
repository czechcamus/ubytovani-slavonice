<?php
/**
 * Creates or drops table of parking types
 */
use yii\db\Migration;

class m150102_174131_create_parking_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'parking_type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('parking_type');
    }
}