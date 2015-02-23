<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150223_101619_create_fee_tax extends Migration
{
    public function safeUp()
    {
        $this->createTable('fee', [
	        'id' => 'pk',
	        'title' => 'string(100) NOT NULL',
	        'value' => 'decimal(10,2) NOT NULL',
	        'tax_id' => 'integer',
	        'property_id' => 'integer NOT NULL'
        ]);

	    $this->createTable('tax', [
		    'id' => 'pk',
		    'value' => 'decimal(10,2) NOT NULL'
	    ]);

	    $this->addForeignKey('fee_property', 'fee', 'property_id', 'property', 'id');
	    $this->addForeignKey('fee_tax', 'fee', 'tax_id', 'tax', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fee_tax', 'fee');
	    $this->dropForeignKey('fee_property', 'fee');
	    $this->dropTable('tax');
	    $this->dropTable('fee');
    }
}