<?php
/**
 * Creates or drops table of facility types
 */
use yii\db\Migration;

class m150102_175542_create_facility_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'facility_type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('facility_type');
    }
}