<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150312_175707_create_image extends Migration
{
    public function safeUp()
    {
        $this->createTable('image', [
	       'id' => 'pk',
	        'facility_id' => 'integer NOT NULL',
	        'title' => 'string(100)',
	        'description' => 'text',
	        'filename' => 'string(100) NOT NULL',
	        'main' => 'boolean'
        ]);
	    $this->addForeignKey('image_facility', 'image', 'facility_id', 'facility', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('image_facility', 'image');
	    $this->dropTable('image');
    }
}