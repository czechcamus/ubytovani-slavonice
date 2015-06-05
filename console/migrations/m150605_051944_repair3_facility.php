<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150605_051944_repair3_facility extends Migration
{
    public function safeUp()
    {
        $this->addColumn('facility', 'latitude', 'decimal(10,6)');
	    $this->addColumn('facility', 'longitude', 'decimal(10,6)');
    }

    public function safeDown()
    {
        $this->dropColumn('facility', 'latitude');
	    $this->dropColumn('facility', 'longitude');
    }
}