<?php
/**
 * Creates or drops subject_address junction table.
 */
use yii\db\Migration;

class m141209_210749_create_subject_address extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'subject_address',
            [
                'subject_id' => 'integer',
                'address_id' => 'integer'
            ]
        );
        $this->createIndex('subject_address_index', 'subject_address', ['subject_id', 'address_id'], true);
    }

    public function safeDown()
    {
        $this->dropIndex('subject_address_index', 'subject_address');
    }
}