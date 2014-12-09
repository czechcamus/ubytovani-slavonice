<?php
/**
 * Repairs types tables.
 */
use yii\db\Migration;

class m141209_185930_repair_types_tables extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('email-type', 'title', 'string(45) NOT NULL');
        $this->alterColumn('phone-type', 'title', 'string(45) NOT NULL');
    }

    public function safeDown()
    {
        $this->alterColumn('email-type', 'title', 'string(45)');
        $this->alterColumn('phone-type', 'title', 'string(45)');
    }
}