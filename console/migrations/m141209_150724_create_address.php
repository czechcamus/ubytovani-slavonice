<?php
/**
 * Creates or drops address table.
 */
use yii\db\Migration;

class m141209_150724_create_address extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'address',
            [
                'id' => 'pk',
                'address_type_id' => 'integer',
                'street' => 'string(45)',
                'house_nr' => 'string(10)',
                'city' => 'string(45) NOT NULL',
                'postal_code' => 'string(10) NOT NULL',
                'created_at' => 'datetime',
                'created_by' => 'integer',
                'updated_at' => 'datetime',
                'updated_by' => 'integer'
            ]
        );
        $this->addForeignKey('address_type_key', 'address', 'address_type_id', 'address-type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('address_type_key', 'address');
        $this->dropTable('address');
    }
}