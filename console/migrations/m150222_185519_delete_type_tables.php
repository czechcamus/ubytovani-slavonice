<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150222_185519_delete_type_tables extends Migration
{
    public function safeUp()
    {
	    $this->dropForeignKey('address_type_key', 'address');
	    $this->dropForeignKey('email_type_key', 'email');
	    $this->dropForeignKey('facility_type_key', 'facility');
	    $this->dropForeignKey('place_type_key', 'facility');
	    $this->dropForeignKey('person_type_key', 'person');
	    $this->dropForeignKey('phone_type_key', 'phone');
	    $this->dropForeignKey('room_type_key', 'room');

        $this->dropTable('address_type');
	    $this->dropTable('email_type');
	    $this->dropTable('facility_type');
	    $this->dropTable('internet_type');
	    $this->dropTable('parking_type');
	    $this->dropTable('person_type');
	    $this->dropTable('phone_type');
	    $this->dropTable('place_type');
	    $this->dropTable('room_type');
    }

    public function safeDown()
    {
	    $this->createTable(
		    'address_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'email_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'phone_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'internet_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'parking_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'place_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'facility_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->createTable(
		    'room_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL',
			    'bed_nr' => 'integer'
		    ]
	    );

	    $this->createTable(
		    'person_type',
		    [
			    'id' => 'pk',
			    'title' => 'string(45) NOT NULL'
		    ]
	    );

	    $this->addForeignKey('address_type_key', 'address', 'address_type_id', 'address_type', 'id');
	    $this->addForeignKey('email_type_key', 'email', 'email_type_id', 'email_type', 'id');
	    $this->addForeignKey('facility_type_key', 'facility', 'facility_type_id', 'facility_type', 'id');
	    $this->addForeignKey('place_type_key', 'facility', 'place_type_id', 'place_type', 'id');
	    $this->addForeignKey('person_type_key', 'person', 'person_type_id', 'person_type', 'id');
	    $this->addForeignKey('phone_type_key', 'phone', 'phone_type_id', 'phone_type', 'id');
	    $this->addForeignKey('room_type_key', 'room', 'room_type_id', 'room_type', 'id');
    }
}