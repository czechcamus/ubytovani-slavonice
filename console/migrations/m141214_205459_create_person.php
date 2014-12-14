<?php
/**
 * Creates or drops person_type table
 */
use yii\db\Migration;

class m141214_205459_create_person extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'person_type',
            [
                'id' => 'pk',
                'title' => 'string(45) NOT NULL'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('person_type');
    }
}