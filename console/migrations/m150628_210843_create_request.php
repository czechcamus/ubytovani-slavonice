<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150628_210843_create_request extends Migration
{
    public function safeUp()
    {
        $this->createTable('request', [
	        'id' => 'pk',
	        'room_id' => 'integer',
	        'date_from' => 'date',
	        'date_to' => 'date',
	        'name' => 'string(25)',
	        'email' => 'string(50)',
	        'phone' => 'string(15)',
	        'note' => 'text',
	        'settled' => 'boolean',
	        'settled_note' => 'text',
	        'settled_at' => 'datetime',
	        'settled_by' => 'integer'
        ]);

	    $this->addForeignKey('request_room_key', 'request', 'room_id', 'room', 'id');
	    $this->addForeignKey('settler_key', 'request', 'settled_by', 'user', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('settler_key', 'request');
        $this->dropForeignKey('request_room_key', 'request');
	    $this->dropTable('request');
    }
}