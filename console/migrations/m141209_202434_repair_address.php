<?php
/**
 * Adds state_id and appropriate foreign key.
 */
use yii\db\Migration;

class m141209_202434_repair_address extends Migration
{
    public function safeUp()
    {
        $this->addColumn('address', 'state_id', 'integer');
        $this->addForeignKey('address_state_key', 'address', 'state_id', 'state', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('address_state_key', 'address');
        $this->dropColumn('address', 'state_id');
    }
}