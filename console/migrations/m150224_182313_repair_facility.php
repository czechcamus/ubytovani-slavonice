<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150224_182313_repair_facility extends Migration
{
    public function safeUp()
    {
	    $this->dropForeignKey('fee_property', 'fee');
	    $this->dropColumn('fee', 'property_id');
	    $this->addColumn('fee', 'object_property_id', 'integer');
	    $this->addForeignKey('fee_object_property', 'fee', 'object_property_id', 'object_property', 'id');
    }

    public function safeDown()
    {
	    $this->dropForeignKey('fee_object_property', 'fee');
	    $this->dropColumn('fee', 'object_property_id');
	    $this->addColumn('fee', 'property_id', 'integer');
	    $this->addForeignKey('fee_property', 'fee', 'property_id', 'property', 'id');
    }
}