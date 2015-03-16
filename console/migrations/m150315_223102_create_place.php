<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150315_223102_create_place extends Migration
{
    public function safeUp()
    {
        $this->createTable('place', [
	        'id' => 'pk',
	        'title' => 'string(45)'
        ]);
	    $this->dropColumn('facility', 'place_type_id');
	    $this->dropForeignKey('place_type_key', 'facility');
	    $this->addColumn('facility', 'place_id', 'integer');
	    $this->addForeignKey('place_key', 'facility', 'place_id', 'place', 'id');
    }

    public function safeDown()
    {
	    $this->dropColumn('facility', 'place_id');
	    $this->dropForeignKey('place_key', 'facility');
	    $this->addColumn('facility', 'place_type_id', 'integer');
	    $this->addForeignKey('place_type_key', 'facility', 'place_type_id', 'type', 'id');
        $this->dropTable('place');
    }
}