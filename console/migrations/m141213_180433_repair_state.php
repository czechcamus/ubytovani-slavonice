<?php
/**
 * Changes title column to name
 */
use yii\db\Migration;

class m141213_180433_repair_state extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('state', 'title');
        $this->addColumn('state', 'name', 'string(45) NOT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('state', 'name');
        $this->addColumn('state', 'title', 'string(45) NOT NULL');
    }
}