<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150308_143013_repair2_object_property extends Migration
{
    public function safeUp()
    {
        $this->addColumn('object_property', 'object_type', 'smallint NOT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('object_property', 'object_type');
    }
}