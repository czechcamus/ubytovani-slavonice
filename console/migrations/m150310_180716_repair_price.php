<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150310_180716_repair_price extends Migration
{
    public function safeUp()
    {
        $this->addColumn('price', 'tax_id', 'integer NOT NULL');
	    $this->addForeignKey('price_tax', 'price', 'tax_id', 'tax', 'id');
    }

    public function safeDown()
    {
	    $this->dropForeignKey('price_tax', 'price');
	    $this->dropColumn('price', 'tax_id');
    }
}