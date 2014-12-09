<?php
/**
 * Creates or drops table of states.
 */
use yii\db\Migration;

class m141209_085553_create_state extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'state',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL',
                'acronym' => 'string(3) NOT NULL',
                'created_at' => 'datetime',
                'created_by' => 'integer',
                'updated_at' => 'datetime',
                'updated_by' => 'integer'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('state');
    }
}