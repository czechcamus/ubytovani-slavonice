<?php
/**
 * Creates or drops email table.
 */
use yii\db\Migration;

class m141209_153513_create_email extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'email',
            [
                'id' => 'pk',
                'email_type_id' => 'integer',
                'address' => 'string(45) NOT NULL',
                'created_at' => 'datetime',
                'created_by' => 'integer',
                'updated_at' => 'datetime',
                'updated_by' => 'integer'
            ]
        );
        $this->addForeignKey('email_type_key', 'email', 'email_type_id', 'email_type', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('email', 'email_type_key');
        $this->dropTable('email');
    }
}