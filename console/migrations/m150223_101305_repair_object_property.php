<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150223_101305_repair_object_property extends Migration
{
    public function safeUp()
    {
	    $this->dropPrimaryKey('object_property_primary', 'object_property');
	    $this->addColumn('object_property', 'id', 'pk');
    }

    public function safeDown()
    {
	    $this->dropColumn('object_property', 'id');
	    $this->addPrimaryKey('object_property_primary', 'object_property', [
		    'object_id',
		    'property_id'
	    ]);
    }
}