<?php
/**
 * Adds subject_id column and appropriate key to the person table.
 */
use yii\db\Migration;

class m141209_204940_repair_person extends Migration
{
    public function safeUp()
    {
        $this->addColumn('person', 'subject_id', 'integer');
        $this->addForeignKey('person_subject_key', 'person', 'subject_id', 'subject', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('person_subject_key', 'person');
        $this->dropColumn('person', 'subject_id');
    }
}