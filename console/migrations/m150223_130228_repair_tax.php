<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150223_130228_repair_tax extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('tax', 'value');
	    $this->addColumn('tax', 'tax_value', 'decimal(10,2) NOT NULL');
    }

    public function safeDown()
    {
	    $this->dropColumn('tax', 'tax_value');
	    $this->addColumn('tax', 'value', 'decimal(10,2) NOT NULL');
    }
}