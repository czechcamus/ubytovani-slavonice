<?php
/**
 * Creates or drops table of rooms
 */
use yii\db\Migration;

class m150102_200410_create_room extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'room',
            [
                'id' => 'pk',
                'subject_id' => 'integer',
                'room_type_id' => 'integer',
                'title' => 'string(45)',
                'nr' => 'integer',
                'note' => 'string(150)',
                'wc' => 'boolean',
                'bath' => 'boolean',
                'douche' => 'boolean',
                'tv' => 'boolean',
                'phone' => 'boolean'
            ]
        );
        $this->addForeignKey('subject_key', 'room', 'subject_id', 'subject', 'id');
        $this->addForeignKey('room_type_key', 'room', 'room_type_id', 'room_type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('subject_key', 'room');
        $this->dropForeignKey('room_type_key', 'room');
        $this->dropTable('room');
    }
}