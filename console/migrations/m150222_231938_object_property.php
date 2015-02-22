<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150222_231938_object_property extends Migration
{
    public function safeUp()
    {
        $this->createTable('object_property', [
	        'object_id' => 'integer NOT NULL',
	        'property_id' => 'integer NOT NULL',
	        'property_note' => 'string(255)',
	        'type_id' => 'integer',
	        'fee' => 'decimal(10,2)',
	        'fee_note' => 'string(255)'
        ]);

	    $this->addPrimaryKey('object_property_primary', 'object_property', [
		    'object_id',
		    'property_id'
	    ]);

	    $this->addForeignKey('object_property_type', 'object_property', 'type_id', 'type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('object_property_type', 'object_property');
	    $this->dropPrimaryKey('object_property_primary', 'object_property');
	    $this->dropTable('object_property');
    }
}