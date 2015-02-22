<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150222_225925_repair_property extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('property', 'type_id');
	    $this->addColumn('property', 'types', 'boolean');
	    $this->addColumn('property', 'fees', 'boolean');
    }

    public function safeDown()
    {
	    $this->dropColumn('property', 'types');
	    $this->dropColumn('property', 'fees');
	    $this->addColumn('property', 'type_id', 'integer');
    }
}