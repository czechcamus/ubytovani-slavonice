<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150303_130119_repair_fee extends Migration
{
    public function safeUp()
    {
        $this->renameTable('fee', 'object_property_fee');
    }

    public function safeDown()
    {
	    $this->renameTable('object_property_fee', 'fee');
    }
}