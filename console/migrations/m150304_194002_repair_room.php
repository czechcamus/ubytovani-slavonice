<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150304_194002_repair_room extends Migration
{
    public function safeUp()
    {
        $this->dropForeignKey('subject_key', 'room');
	    $this->renameColumn('room', 'subject_id', 'facility_id');
	    $this->addColumn('room', 'bed_nr', 'tinyint NOT NULL');
	    $this->addForeignKey('facility_key', 'room', 'facility_id', 'facility', 'id');
    }

    public function safeDown()
    {
	    $this->dropForeignKey('facility_key', 'room');
        $this->dropColumn('room', 'bed_nr');
	    $this->renameColumn('room', 'facility_id', 'subject_id');
	    $this->addForeignKey('subject_key', 'room', 'subject_id', 'subject', 'id');
    }
}