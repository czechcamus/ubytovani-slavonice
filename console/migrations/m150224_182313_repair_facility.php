<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150224_182313_repair_facility extends Migration
{
    public function safeUp()
    {
	    //TODO update this
        $this->addColumn('facility', 'partner', 'boolean');
    }

    public function safeDown()
    {
        $this->dropColumn('facility', 'partner');
    }
}