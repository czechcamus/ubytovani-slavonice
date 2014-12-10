<?php
/**
 * Deletes audit keys from email, phone, state and person tables.
 * Adds or removes user audit keys.
 */
use yii\db\Migration;

class m141210_164512_add_audit_keys extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('email', 'created_at');
        $this->dropColumn('email', 'created_by');
        $this->dropColumn('email', 'updated_at');
        $this->dropColumn('email', 'updated_by');
        $this->dropColumn('phone', 'created_at');
        $this->dropColumn('phone', 'created_by');
        $this->dropColumn('phone', 'updated_at');
        $this->dropColumn('phone', 'updated_by');
        $this->dropColumn('state', 'created_at');
        $this->dropColumn('state', 'created_by');
        $this->dropColumn('state', 'updated_at');
        $this->dropColumn('state', 'updated_by');
        $this->dropColumn('person', 'created_at');
        $this->dropColumn('person', 'created_by');
        $this->dropColumn('person', 'updated_at');
        $this->dropColumn('person', 'updated_by');
        $this->addForeignKey('address_created_by_key', 'address', 'created_by', 'user', 'id');
        $this->addForeignKey('address_updated_by_key', 'address', 'created_by', 'user', 'id');
        $this->addForeignKey('subject_created_by_key', 'subject', 'created_by', 'user', 'id');
        $this->addForeignKey('subject_updated_by_key', 'subject', 'created_by', 'user', 'id');
    }

    public function safeDown()
    {
        $this->addColumn('email', 'created_at', 'datetime');
        $this->addColumn('email', 'created_by', 'integer');
        $this->addColumn('email', 'updated_at', 'datetime');
        $this->addColumn('email', 'updated_by', 'integer');
        $this->addColumn('phone', 'created_at', 'datetime');
        $this->addColumn('phone', 'created_by', 'integer');
        $this->addColumn('phone', 'updated_at', 'datetime');
        $this->addColumn('phone', 'updated_by', 'integer');
        $this->addColumn('state', 'created_at', 'datetime');
        $this->addColumn('state', 'created_by', 'integer');
        $this->addColumn('state', 'updated_at', 'datetime');
        $this->addColumn('state', 'updated_by', 'integer');
        $this->addColumn('person', 'created_at', 'datetime');
        $this->addColumn('person', 'created_by', 'integer');
        $this->addColumn('person', 'updated_at', 'datetime');
        $this->addColumn('person', 'updated_by', 'integer');
        $this->dropForeignKey('address_created_by_key', 'address');
        $this->dropForeignKey('address_updated_by_key', 'address');
        $this->dropForeignKey('subject_created_by_key', 'subject');
        $this->dropForeignKey('subject_updated_by_key', 'subject');
    }
}