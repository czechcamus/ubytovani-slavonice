<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150304_171524_repair2_facility extends Migration
{
    public function safeUp()
    {
        $this->addColumn('facility', 'active', 'boolean');
    }

    public function safeDown()
    {
        $this->dropColumn('facility', 'active');
    }
}