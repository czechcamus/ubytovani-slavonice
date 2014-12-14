<?php
/**
 * Adds or drops person_type_id column
 */
use yii\db\Migration;

class m141214_212907_repair2_person extends Migration
{
    public function safeUp()
    {
        $this->addColumn('person', 'person_type_id', 'integer');
        $this->addForeignKey('person_type_key', 'person', 'person_type_id', 'person_type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('person_type_key', 'person');
        $this->dropColumn('person', 'person_type_id');
    }
}