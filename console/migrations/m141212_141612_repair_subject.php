<?php
/**
 * Changes title column to be not null.
 */
use yii\db\Migration;

class m141212_141612_repair_subject extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('subject', 'title', 'string(45) NOT NULL');
    }

    public function safeDown()
    {
        $this->alterColumn('subject', 'title', 'string(45)');
    }
}