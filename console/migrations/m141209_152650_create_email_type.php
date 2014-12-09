<?php
/**
 * Creates or drops email-type table.
 */
use yii\db\Migration;

class m141209_152650_create_email_type extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'email-type',
            [
                'id' => 'pk',
                'title' => 'string(45)'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('email-type');
    }
}