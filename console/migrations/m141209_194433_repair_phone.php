<?php
/**
 * Adds audit fields to the phone table.
 */
use yii\db\Migration;

class m141209_194433_repair_phone extends Migration
{
    public function safeUp()
    {
        $this->addColumn('phone', 'created_at', 'datetime');
        $this->addColumn('phone', 'created_by', 'integer');
        $this->addColumn('phone', 'updated_at', 'datetime');
        $this->addColumn('phone', 'updated_by', 'integer');
    }

    public function safeDown()
    {
        $this->dropColumn('phone', 'created_at');
        $this->dropColumn('phone', 'created_by');
        $this->dropColumn('phone', 'updated_at');
        $this->dropColumn('phone', 'updated_by');
    }
}