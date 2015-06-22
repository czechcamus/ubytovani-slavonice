<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150622_122633_availability extends Migration
{
    public function safeUp()
    {
        $this->createTable('availability', [
	        'id' => 'pk',
	        'room_id' => 'integer',
	        'date_from' => 'date NOT NULL',
	        'date_to' => 'date NOT NULL',
	        'description' => 'string(100)'
        ]);
	    $this->addForeignKey('availability_room_key', 'availability', 'room_id', 'room', 'id');
    }

    public function safeDown()
    {
	    $this->dropForeignKey('availability_room_key', 'availability');
	    $this->dropTable('availability');
    }
}