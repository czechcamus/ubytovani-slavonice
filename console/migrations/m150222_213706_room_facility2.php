<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150222_213706_room_facility2 extends Migration
{
    public function safeUp()
    {
        $this->dropPrimaryKey('facility_property_primary', 'facility_facility_property');
	    $this->dropTable('facility_facility_property');
	    $this->dropPrimaryKey('room_property_primary', 'room_room_property');
	    $this->dropTable('room_room_property');
	    $this->dropTable('facility_property');
	    $this->dropTable('room_property');

	    $this->createTable('property', [
		    'id' => 'pk',
		    'title' => 'string(45) NOT NULL',
		    'property_type' => 'smallint',
		    'model_type' => 'smallint',
		    'type_id' => 'integer'
	    ]);
    }

    public function safeDown()
    {
        $this->dropTable('property');

	    $this->createTable('room_property', [
		    'id' => 'pk',
		    'title' => 'string(45) NOT NULL'
	    ]);

	    $this->createTable('facility_property', [
		    'id' => 'pk',
		    'title' => 'string(45) NOT NULL',
		    'note' => 'string(100)',
		    'type' => 'string(15)',
		    'type_id' => 'integer',
		    'fee' => 'decimal(10,2)',
		    'fee_note' => 'string(100)'
	    ]);

	    $this->createTable('room_room_property', [
		    'room_id' => 'integer',
		    'room_property_id' => 'integer'
	    ]);

	    $this->addPrimaryKey('room_property_primary', 'room_room_property', [
		    'room_id',
		    'room_property_id'
	    ]);

	    $this->createTable('facility_facility_property', [
		    'facility_id' => 'integer',
		    'facility_property_id' => 'integer'
	    ]);

	    $this->addPrimaryKey('facility_property_primary', 'facility_facility_property', [
		    'facility_id',
		    'facility_property_id'
	    ]);
    }
}