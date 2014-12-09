<?php
/**
 * Creates or drops subject table.
 */
use yii\db\Migration;

class m141209_203256_create_subject extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'subject',
            [
                'id' => 'pk',
                'title' => 'string(45)',
                'note' => 'text',
                'company_nr' => 'string(10)',
                'tax_nr' => 'string(14)',
                'created_at' => 'datetime',
                'created_by' => 'integer',
                'updated_at' => 'datetime',
                'updated_by' => 'integer'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('subject');
    }
}