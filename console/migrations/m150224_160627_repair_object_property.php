<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150224_160627_repair_object_property extends Migration
{
    public function safeUp()
    {
	    $this->dropForeignKey('object_property_type', 'object_property');

        $this->dropColumn('object_property', 'type_id');
	    $this->dropColumn('object_property', 'fee');
	    $this->dropColumn('object_property', 'fee_note');
    }

    public function safeDown()
    {
        $this->addColumn('object_property', 'fee_note', 'string(255)');
	    $this->addColumn('object_property', 'fee', 'decimal(10,2)');
	    $this->addColumn('object_property', 'type_id', 'integer');

	    $this->addForeignKey('object_property_type', 'object_property', 'type_id', 'type', 'id');
    }
}