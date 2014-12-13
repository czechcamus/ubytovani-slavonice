<?php
/**
 * Adds or drops subject_id column
 */
use yii\db\Migration;

class m141213_151447_repair2_address extends Migration
{
    public function safeUp()
    {
        $this->addColumn('address','subject_id', 'integer NOT NULL');
        $this->addForeignKey('address_subject_key', 'address', 'subject_id', 'subject', 'id');
        $this->dropForeignKey('address_created_by_key', 'address');
        $this->dropForeignKey('address_updated_by_key', 'address');
        $this->dropColumn('address', 'created_at');
        $this->dropColumn('address', 'created_by');
        $this->dropColumn('address', 'updated_at');
        $this->dropColumn('address', 'updated_by');
    }

    public function safeDown()
    {
        $this->dropForeignKey('address_subject_key', 'address');
        $this->dropColumn('address', 'subject_id');
        $this->addColumn('address', 'created_at', 'datetime');
        $this->addColumn('address', 'created_by', 'integer');
        $this->addColumn('address', 'updated_at', 'datetime');
        $this->addColumn('address', 'updated_by', 'integer');
        $this->addForeignKey('address_created_by_key', 'address', 'created_by', 'user', 'id');
        $this->addForeignKey('address_updated_by_key', 'address', 'updated_by', 'user', 'id');
    }
}