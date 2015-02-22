<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150221_082211_repair_room_facility extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('room', 'wc');
	    $this->dropColumn('room', 'bath');
	    $this->dropColumn('room', 'douche');
	    $this->dropColumn('room', 'tv');
	    $this->dropColumn('room', 'phone');

	    $this->dropForeignKey('internet_type_key', 'facility');
	    $this->dropForeignKey('parking_type_key', 'facility');

	    $this->dropColumn('facility', 'internet');
	    $this->dropColumn('facility', 'internet_type_id');
	    $this->dropColumn('facility', 'internet_day_fee');
	    $this->dropColumn('facility', 'parking');
	    $this->dropColumn('facility', 'parking_type_id');
	    $this->dropColumn('facility', 'parking_day_fee');
	    $this->dropColumn('facility', 'food_in_price');
	    $this->dropColumn('facility', 'food_in_price_note');
	    $this->dropColumn('facility', 'food_optional');
	    $this->dropColumn('facility', 'food_optional_note');
	    $this->dropColumn('facility', 'children');
	    $this->dropColumn('facility', 'animals');
	    $this->dropColumn('facility', 'no_barriers');
	    $this->dropColumn('facility', 'bikers_welcomed');

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

    public function safeDown()
    {
	    $this->dropForeignKey('facility_property_primary', 'facility_facility_property');
	    $this->dropTable('facility_facility_property');
	    $this->dropForeignKey('room_property_primary', 'room_room_property');
	    $this->dropTable('room_room_property');

	    $this->addColumn('facility', 'internet', 'boolean');
	    $this->addColumn('facility', 'internet_type_id', 'integer');
	    $this->addColumn('facility', 'internet_day_fee', 'decimal(10,2)');
	    $this->addColumn('facility', 'parking', 'boolean');
	    $this->addColumn('facility', 'parking_type_id', 'integer');
	    $this->addColumn('facility', 'parking_day_fee', 'decimal(10,2)');
	    $this->addColumn('facility', 'food_in_price', 'boolean');
	    $this->addColumn('facility', 'food_in_price_note', 'string(100)');
	    $this->addColumn('facility', 'food_optional', 'boolean');
	    $this->addColumn('facility', 'food_optional_note', 'string(100)');
	    $this->addColumn('facility', 'children', 'boolean');
	    $this->addColumn('facility', 'animals', 'boolean');
	    $this->addColumn('facility', 'no_barriers', 'boolean');
	    $this->addColumn('facility', 'bikers_welcomed', 'boolean');

	    $this->addForeignKey('parking_type_key', 'facility', 'parking_type_id', 'parking_type', 'id');
	    $this->addForeignKey('internet_type_key', 'facility', 'internet_type_id', 'internet_type', 'id');

	    $this->addColumn('room', 'phone', 'boolean');
	    $this->addColumn('room', 'tv', 'boolean');
	    $this->addColumn('room', 'douche', 'boolean');
	    $this->addColumn('room', 'bath', 'boolean');
        $this->addColumn('room', 'wc', 'boolean');
    }
}