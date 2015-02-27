<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150227_195245_repair_object_property extends Migration
{
    public function safeUp()
    {
        $this->addColumn('object_property', 'property_value', 'boolean');
    }

    public function safeDown()
    {
        $this->dropColumn('object_property', 'property_value');
    }
}