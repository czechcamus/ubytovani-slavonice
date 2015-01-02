<?php
/**
 * Creates or drops table of room types
 */
use yii\db\Migration;

class m150102_180226_create_room_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'room_type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL',
                'bed_nr' => 'integer'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('room_type');
    }
}