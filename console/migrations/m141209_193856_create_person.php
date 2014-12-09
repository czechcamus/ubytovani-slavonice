<?php
/**
 * Creates or drops person.
 */
use yii\db\Migration;

class m141209_193856_create_person extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'person',
            [
                'id' => 'pk',
                'front_title' => 'string(20)',
                'name' => 'string(30) NOT NULL',
                'surname' => 'string(30) NOT NULL',
                'back_title' => 'string(20)',
                'created_at' => 'datetime',
                'created_by' => 'integer',
                'updated_at' => 'datetime',
                'updated_by' => 'integer'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('person');
    }
}