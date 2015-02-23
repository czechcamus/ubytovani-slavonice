<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150223_155416_subject_facility_repair extends Migration
{
    public function safeUp()
    {
        $this->addColumn('subject', 'completed', 'boolean NOT NULL');
	    $this->addColumn('facility', 'completed', 'boolean NOT NULL');
    }

    public function safeDown()
    {
	    $this->dropColumn('subject', 'completed');
	    $this->dropColumn('facility', 'completed');
    }
}