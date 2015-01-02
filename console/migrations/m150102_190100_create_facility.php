<?php
/**
 * Creates or drops table of facilities
 */
use yii\db\Migration;

class m150102_190100_create_facility extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'facility',
            [
                'id' => 'pk',
                'subject_id' => 'integer',
                'person_id' => 'integer',
                'partner' => 'boolean',
                'place_type_id' => 'integer',
                'facility_type_id' => 'integer',
                'title' => 'string(100) NOT NULL',
                'weburl' => 'string(100)',
                'street' => 'string(45)',
                'house_nr' => 'string(10)',
                'city' => 'string(45) NOT NULL',
                'postal_code' => 'string(10) NOT NULL',
                'checkin_from' => 'time',
                'checkin_to' => 'time',
                'checkout_from' => 'time',
                'checkout_to' => 'time',
                'internet' => 'boolean',
                'internet_type_id' => 'integer',
                'internet_day_fee' => 'decimal(10,2)',
                'parking' => 'boolean',
                'parking_type_id' => 'integer',
                'parking_day_fee' => 'decimal(10,2)',
                'food_in_price' => 'boolean',
                'food_in_price_note' => 'string(100)',
                'food_optional' => 'boolean',
                'food_optional_note' => 'string(100)',
                'children' => 'boolean',
                'animals' => 'boolean',
                'no_barriers' => 'boolean',
                'bikers_welcomed' => 'boolean',
                'certificate' => 'string(100)',
                'stars' => 'integer',
                'description' => 'text',
                'created_at' => 'datetime',
                'created_by' => 'integer',
                'updated_at' => 'datetime',
                'updated_by' => 'integer'
            ]
        );
        $this->addForeignKey('place_type_key', 'facility', 'place_type_id', 'place_type', 'id');
        $this->addForeignKey('facility_type_key', 'facility', 'facility_type_id', 'facility_type', 'id');
        $this->addForeignKey('internet_type_key', 'facility', 'internet_type_id', 'internet_type', 'id');
        $this->addForeignKey('parking_type_key', 'facility', 'parking_type_id', 'parking_type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('place_type_key', 'facility');
        $this->dropForeignKey('facility_type_key', 'facility');
        $this->dropForeignKey('internet_type_key', 'facility');
        $this->dropForeignKey('parking_type_key', 'facility');
        $this->dropTable('facility');
    }
}