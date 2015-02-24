<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150224_161509_object_property_type extends Migration
{
    public function safeUp()
    {
        $this->createTable('object_property_type', [
	        'object_property_id' => 'integer NOT NULL',
			'type_id' => 'integer NOT NULL'
        ]);

	    $this->addPrimaryKey('object_property_type_key', 'object_property_type', [
		    'object_property_id',
		    'type_id'
	    ]);
    }

    public function safeDown()
    {
        $this->dropPrimaryKey('object_property_type_key', 'object_property_type');

	    $this->dropTable('object_property_type');
    }
}