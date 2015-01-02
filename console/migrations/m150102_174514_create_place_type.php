<?php
/**
 * Creates or drops table of place types
 */
use yii\db\Migration;

class m150102_174514_create_place_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'place_type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('place_type');
    }
}