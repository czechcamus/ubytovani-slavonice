<?php
/**
 * Adds person_id column and appropriate foreign keys.
 */
use yii\db\Migration;

class m141209_195758_repair_phone_email extends Migration
{
    public function safeUp()
    {
        $this->addColumn('phone', 'person_id', 'integer');
        $this->addColumn('email', 'person_id', 'integer');
        $this->addForeignKey('phone_person_key', 'phone', 'person_id', 'person', 'id');
        $this->addForeignKey('email_person_key', 'email', 'person_id', 'person', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('email_person_key', 'email');
        $this->dropForeignKey('phone_person_key', 'phone');
        $this->dropColumn('email', 'person_id');
        $this->dropColumn('phone', 'person_id');
    }
}