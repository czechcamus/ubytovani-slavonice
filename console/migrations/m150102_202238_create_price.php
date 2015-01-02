<?php
/**
 * Creates or drops table of room prices
 */
use yii\db\Migration;

class m150102_202238_create_price extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'price',
            [
                'id' => 'pk',
                'room_id' => 'integer',
                'title' => 'string(100) NOT NULL',
                'fee' => 'decimal(10,2) NOT NULL'
            ]
        );
        $this->addForeignKey('room_key', 'price', 'room_id', 'room', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('room_key', 'price');
        $this->dropTable('price');
    }
}