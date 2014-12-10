<?php
/**
 * Creates or drops phone type table.
 */
use yii\db\Migration;

class m141209_184735_create_phone_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'phone_type',
            [
                'id' => 'pk',
                'title' => 'string(45)'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('phone_type');
    }
}