<?php
/**
 * Creates or drops phone table.
 */
use yii\db\Migration;

class m141209_185201_create_phone extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'phone',
            [
                'id' => 'pk',
                'phone_type_id' => 'integer',
                'number' => 'string(15) NOT NULL'
            ]
        );
        $this->addForeignKey('phone_type_key', 'phone', 'phone_type_id', 'phone_type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('phone_type_key', 'phone');
        $this->dropTable('phone');
    }
}