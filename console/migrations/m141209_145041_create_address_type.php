<?php
/**
 * Creates or drops table of address types
 */
use yii\db\Migration;

class m141209_145041_create_address_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'address-type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('address-type');
    }
}